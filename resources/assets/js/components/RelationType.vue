<template>
    <div class="relation-type">
        <a :id="'rt'+index" class="anchor"></a> <!-- anchor -->
        <!-- relation-type-header -->
        <div class="relation-type-header">
            <h3>{{relationType.name}}</h3>

            <!-- Single button -->
            
            
        </div>
        <!-- definition -->
        <div class="relation-type-content">
            <p class="definition"><b>Définition :</b>{{relationType.description}}</p>

            <div v-if="inbound.rels.length > 0" class="relations-in">
                <p><u>Relations Entrantes</u></p>
                <ul class="list-inline">
                    <li v-for="relation in inbound.rels">
                        <word :id="relation.id" :word="relation.node" :weight="relation.weight"
                              @card="displayCard" @uncard="destroyCard"></word>
                    </li>
                    
                    
                </ul>
            </div>
            <div v-if="outbound.rels.length > 0" class="relations-out">
                <p><u>Relations Sortantes</u></p>
                <ul class="list-inline">
                    <li v-for="relation in outbound.rels">
                        <word :id="relation.id" :word="relation.node" :weight="relation.weight"
                              @card="displayCard" @uncard="destroyCard"></word>
                    </li>
                    
                </ul>
            </div>
        </div>

        <hr/>
    </div>
</template>

<script>
    import Word from "./Word.vue"

    export default {
        props: {
            relationType: {
                type: Object,
                required: true,
            },
            index: {
                type: Number,
                required: true,
            },
            nodeId: {
                type: Number,
                required: true,
            },
        },

        data() {
            return {
                search: "",
                order: "weight",
                sortBy: 'desc',
                inbound: {
                    rels: null,
                    page: 1,
                    next: false,
                    loading: false,
                },
                outbound: {
                    rels: null,
                    page: 1,
                    next: false,
                    loading: false,
                }
            }
        },

        created() {
            this.inbound.rels = this.relationType.relations.in;
            this.inbound.next = this.inbound.rels.length === 1000;
            this.outbound.rels = this.relationType.relations.out;
            this.outbound.next = this.outbound.rels.length === 1000
        },

        mounted() {
            console.log('RelationType ' + this.relationType.name + ' mounted');
        },

        components: {
            "word": Word
        },

        watch: {
            heritedSearch: function (value) {
                this.search = value
            },
            relationTypes: function () {
                this.inbound.rels = this.relationType.relations.in;
                this.outbound.rels = this.relationType.relations.out;
            },

            order: function () {
                this.resetPageIn();
                this.resetPageOut();
            },
            sortBy: function () {
                this.resetPageIn();
                this.resetPageOut();
            },
        },

        methods: {
            displayCard(value) {//parent delegation
                this.$emit("card", value);
            },

            destroyCard() {//parent delegation
                this.$emit("uncard");
            },

            searchWord: _.debounce(function (search) {
                this.search = search;
                if (search === "") {
                    this.resetPageIn();
                    this.resetPageOut()
                } else {
                    const url = '/api/node/' + this.nodeId + '/relation-type/' + this.relationType.id + '/search/';
                    console.log(url);

                    axios.get(url, {params: {q: search}})
                        .then((response) => {
                            this.inbound.page = 1;
                            this.inbound.rels = response.data.in;
                            this.inbound.next = false;
                            this.outbound.page = 1;
                            this.outbound.rels = response.data.out;
                            this.outbound.next = false;

                            this.$emit('updateOffsetTop')
                        })
                        .catch((error) => {
                            console.log(error);
                        })

                }
            }, 300),

            resetPageIn() {
                const url = '/api/node/' + this.nodeId + '/relation-type/' + this.relationType.id + '/in/';
                axios.get(url, {params: {orderBy: this.order, sort: this.sortBy}})
                    .then((response) => {
                        this.inbound.page = 1;
                        this.inbound.rels = response.data.results;

                        if (this.inbound.rels.length === response.data.count) {
                            this.inbound.next = false;
                        }

                        this.$emit('updateOffsetTop')
                    })
                    .catch((error) => {
                        console.log(error);
                    })
            },

            resetPageOut() {
                const url = '/api/node/' + this.nodeId + '/relation-type/' + this.relationType.id + '/out/';
                axios.get(url, {params: {orderBy: this.order, sort: this.sortBy}})
                    .then((response) => {
                        this.outbound.page = 1;
                        this.outbound.rels = response.data.results;

                        if (this.outbound.rels.length === response.data.count) {
                            this.outbound.next = false;
                        }

                        this.$emit('updateOffsetTop')
                    })
                    .catch((error) => {
                        console.log(error)
                    })
            },

            nextPageIn() {
                if (this.inbound.next) {// failsafe
                    this.inbound.loading = true;
                    const url = '/api/node/' + this.nodeId + '/relation-type/' + this.relationType.id + '/in/' + this.inbound.page;
                    axios.get(url, {params: {orderBy: this.order, sort: this.sortBy}})
                        .then((response) => {
                            this.inbound.page++;
                            this.inbound.rels = _.concat(this.inbound.rels, response.data.results);

                            if (this.inbound.rels.length === response.data.count) {
                                this.inbound.next = false;
                            }
                            this.inbound.loading = false;

                            this.$emit('updateOffsetTop')
                        })
                        .catch((error) => {
                            console.log(error);
                            this.inbound.loading = false
                        })
                }
            },

            nextPageOut() {
                if (this.outbound.next) {// failsafe
                    this.outbound.loading = true;
                    const url = '/api/node/' + this.nodeId + '/relation-type/' + this.relationType.id + '/out/' + this.outbound.page;
                    axios.get(url, {params: {orderBy: this.order, sort: this.sortBy}})
                        .then((response) => {
                            this.outbound.page++;
                            this.outbound.rels = _.concat(this.outbound.rels, response.data.results);

                            if (this.outbound.rels.length === response.data.count) {
                                this.outbound.next = false;
                            }
                            this.outbound.loading = false;

                            this.$emit('updateOffsetTop')
                        })
                        .catch((error) => {
                            console.log(error)
                            this.outbound.loading = false;
                        })
                }

            },
        },

    }
</script>
<style>
    .relation-type-header h3 a {
        float: left;
        padding-right: 4px;
        padding-top: 4px;
        margin-left: -16px;
        line-height: 1;
    }

    .relation-type-header h3 a i {
        font-size: 14px;
        visibility: hidden;
    }

    .relation-type-header h3:hover a i {
        visibility: visible;
    }

    .relation-type hr {
        margin-bottom: 0;
    }

    .relation-type-header {
        display: flex;
        align-items: center;
    }

    .relation-type-header h3 {
        flex-grow: 1;
    }

    .relation-type-header button span.glyphicon {
        line-height: 1.6;
    }

    .definition:before {
        content: "» ";
        font-weight: bold;
    }

    .relations-in > ul {
        padding-left: 1em;
    }

    .relations-out > ul {
        padding-left: 1em;
    }

    a.anchor {
        display: block;
        position: relative;
        top: -50px;
        visibility: hidden;
    }

</style>