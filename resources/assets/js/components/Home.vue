<template>
    <div id="home">
        <canvas class="fireworks"></canvas>

        <div v-if="errors" id="errors" class="alert alert-danger content" role="alert">
            {{errors}}
        </div>
        <div class="flex-center position-ref full-height">
            <div class="content container-fluid">
                <div class="row title m-b-md">
                Jeux de mots !
                    <div class="searchbar col-sm-6 col-sm-offset-3">
                        <form action="/search">
                            <div class="input-group">
                                <input type="text" name="q" v-model="query" class="form-control"
                                       placeholder="Rechercher">
                                <span class="input-group-btn"><button class="btn btn-default"
                                                                      type="submit">
                                <i class="glyphicon glyphicon-search"></i></button></span>
                            </div><!-- /input-group -->
                            </li>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        
    </div>
</template>
<script>    

    export default {
        mounted() {
            console.log('Main mounted');
            init();
        },

        data: function () {
            return {
                query: ""
            }
        },

        props: {
            errors: {type: String}
        },
    }
</script>
<style>
    html, body {
        background-color: #fff;
        color: #636b6f;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }

    input {
        font-weight: 600;
    }

    .full-height {
        height: 100vh;
    }

    .flex-center {
        align-items: center;
        display: flex;
        justify-content: center;
    }

    .position-ref {
        position: relative;
    }

    .content {
        text-align: center;
    }

    .title {
        font-size: 84px;
    }

    .m-b-md {
        margin-bottom: 30px;
    }

    .fireworks {
        position: absolute;
    }

    #errors {
        width: 100%;
        position: absolute;
        color: #636b6f;
        font-weight: 600;
        letter-spacing: .1rem;
        text-decoration: none;
        text-transform: uppercase;
    }

    #myModal {
        color: black;
    }
</style>