<template>

    <div class="container">

        <div class="row mt-3">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Users Table</h3>

                        <div class="card-tools">

                            <button class="btn btn-success" data-toggle="modal" data-target="#addNew">
                                Add New
                                <i class="fas fa-user-plus fa-fw"></i>
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
                                    <th>Modify</th>
                                </tr>
                            </thead>

                            <tbody>

                                <tr>

                                    <td>183</td>
                                    <td>John Doe</td>
                                    <td>11-7-2014</td>
                                    <td><span class="tag tag-success">Approved</span></td>

                                    <td>

                                        <a href="#">
                                            <i class="fa fa-edit blue"></i>
                                        </a>
                                        /
                                        <a href="#">
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
        <div class="modal fade" id="addNew" tabindex="-1" aria-labelledby="addNewLabel" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">

                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-title" id="addNewLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Modal body text goes here.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>
export default {
name: "User"
}
</script>

<style scoped>

</style>
