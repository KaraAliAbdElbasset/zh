<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"  rel="tooltip" data-target="#exampleModal">
            <i class="material-icons">add</i>
        </button>
        <!-- Modal -->
        <div class="modal fade" data-backdrop="static" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" @click="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="query">البحث...</label>
                            <input type="text" id="query" placeholder="البحث..." class="form-control" v-model="query">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group" v-for="s in students" :key="s.id">
                                    <label> {{s.name}}
                                        <input type="checkbox" class="form-control" name="student">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="close" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: "AddStudentToGroup",
    props:{
        groupId:{
            required: true,
            type:Number
        }
    },
    data(){
        return {
            query: '',
            students:[],
            selected:[]
        }
    },

    watch:{
      query(val){
          if (!this.loading &&  val.length > 2)
          {
              this.search();
          }
      }
    },
    methods:{
        show(){

        },
        close(){

        },
        save(){

        },
        search(){

        }
    }
}
</script>

<style scoped>

</style>
