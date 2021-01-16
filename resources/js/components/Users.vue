<template>

    <div class="container">

        <div class="row mt-3">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Users Table</h3>

                        <div class="card-tools">

                            <button class="btn btn-success" @click="newModal">
                                Add New
                                <i class="fas fa-user-plus fa fw"></i>
                            </button>

                        </div>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">

                        <table class="table table-hover">

                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Registered At</th>
                                    <th>Modify</th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr v-for="user in users" :key="user.id">

                                    <td>{{ user.id }}</td>
                                    <td>{{ user.name }}</td>
                                    <td>{{ user.email }}</td>
                                    <td>{{ user.role | upText }}</td>
                                    <td>{{ user.created_at | myDate }}</td>
                                    <td>

                                        <a href="#" @click="editModal(user)">
                                            <i class="fa fa-edit blue"></i>
                                        </a>
                                        /
                                        <a href="#" @click="deleteUser(user.id)">
                                            <i class="fa fa-trash red"></i>
                                        </a>

                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>

        <!-- Modal View -->
        <div class="modal fade" id="addNew" tabindex="-1" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" v-show="!editmode" id="addNewLabel">Add New</h5>
                        <h5 class="modal-title" v-show="editmode" id="addNewLabel">Update User's Info</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form @submit.prevent="editmode ? updateUser() : createUser()">

                        <div class="modal-body">

                            <div class="form-group">
                                <input v-model="form.name" type="text" name="name"
                                       placeholder="name"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                                <has-error :form="form" field="name"></has-error>
                            </div>
                            <div class="form-group">
                                <input v-model="form.email" type="email" name="email"
                                       placeholder="Email"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                                <has-error :form="form" field="email"></has-error>
                            </div>

                            <div class="form-group">

                                <select name="role" v-model="form.role" id="role" class="form-control" :class="{ 'is-invalid': form.errors.has('role') }">

                                    <option value="">Select User Role</option>
                                    <option value="admin">Administrator</option>
                                    <option value="user">Standar User</option>
                                    <option value="publisher">Publisher</option>

                                </select>
                                <has-error :form="form" field="role"></has-error>

                            </div>

                            <div class="form-group">
                                <input v-model="form.password" type="password" name="password"
                                       placeholder="Password"
                                       class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                                <has-error :form="form" field="password"></has-error>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button v-show="!editmode" type="submit" class="btn btn-primary">Create</button>
                            <button v-show="editmode" type="submit" class="btn btn-success">Update</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>



    </div>

</template>

<script>

    export default {

        data() {
            return {
                editmode: false,
                users: {},
                form: new Form({
                    id:'',
                    name: '',
                    email: '',
                    password: '',
                    role: '',
                })
            }
        },
        methods: {
            editModal(user) {
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(user);
            },
            newModal() {
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            deleteUser(id){
                swal.fire({

                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'

                }).then((result) => {

                    //Send request to the server
                    if (result.value){
                        this.form
                            .delete('api/user/'+id)
                            .then(() => {
                                swal.fire(
                                    'Deleted!',
                                    'User has been deleted.',
                                    'success'
                                )
                                Fire.$emit('AfterCreate');
                            })
                            .catch(() => {
                                swal("Failed", "There was something wrong.", "warning!");
                            });
                    }
                })
            },
            loadUsers(){
                axios
                    .get('api/user')
                    .then( (response) => {
                        this.users = response.data.data
                    })
                    .catch(function(error){
                        console.log(error)
                    });
            },
            createUser() {
                this.$Progress.start();

                this.form.post('api/user')
                    .then(() => {
                        Fire.$emit('AfterCreate');
                        $('#addNew').modal('hide')
                        toast.fire({
                            type: 'success',
                            title: 'User created successfully'
                        })
                        this.$Progress.finish()
                    })
                    .catch((error) => {
                        console.log(error);
                    });
            },
            updateUser() {
                this.$Progress.start();
                this.form
                    .put('api/user/' + this.form.id)
                    .then(() => {
                        $('#addNew').modal('hide');
                        swal.fire(
                            'Updated!',
                            'Information has been updated.',
                            'success'
                        )
                        this.$Progress.finish();
                        Fire.$emit('AfterCreate');
                    })
                    .catch(() => {
                        this.$Progress.fail();
                    });
            }
        },

        created() {
            this.loadUsers();
            Fire.$on('AfterCreate',() => {
                this.loadUsers();
            });
        }


    }

</script>

<style scoped>

</style>
