<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2 mt-1">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h5 class="content-header-title float-left pr-1 mb-0">Fixed Navbar</h5>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb p-0 mb-0">
                                <li class="breadcrumb-item"><a href="sk-layout-2-columns.html"><i class="bx bx-home-alt"></i></a></li>
                                <li class="breadcrumb-item"><a href="#">Starter Kit</a> </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">

            <section id="description" class="card shadow-none border">
                <div class="card-header">
                    <h4 class="card-title">Description</h4>
                </div>
                <div class="card-content">
                    <form id="formData" class="form form-horizontal" onsubmit="return false">

                        <div class="card-body">
                            <div class="card-text">
                                <p>The fixed navbar layout has a fixed navbar and navigation menu and footer. Only navbar section is fixed to user. In this page you can experience it.</p>
                            </div>
                            <div>
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>NIM</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" class="form-control" name="mhsNiu">
                                            <div class="invalid-feedback mhsNiu"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Nama</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" class="form-control" name="mhsNama">
                                            <div class="invalid-feedback mhsNama"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Avatar</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="file" class="form-control" name="avatar1">
                                            <div class="invalid-feedback avatar1"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Avatar 2</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="file" class="form-control" name="avatar2">
                                            <div class="invalid-feedback avatar2"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-end">
                            <button type="submit" class="btnSimpan btn btn-primary mr-1 mb-1">Submit</button>
                            <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
                        </div>
                    </form>

                </div>
            </section>

            <section id="basic-datatable">
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-none border">
                            <div class="card-header">
                                <h4 class="card-title">Zero configuration</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body card-dashboard">
                                    <p class="card-text">DataTables has most features enabled by default, so all you need to do to
                                        use it with your own tables is to call the construction function: $().DataTable();.</p>
                                    <div class="table-responsive">
                                        <table class="dataTable table zero-configuration table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIM</th>
                                                    <th>Name</th>
                                                    <th>Name</th>
                                                    <th>Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- BASIC MODAL -->
            <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <form id="formData" method="POST" class="form form-horizontal">

                            <div class="modal-header">
                                <h3 class="modal-title" id="myModalLabel1">Basic Modal</h3>
                                <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                                    <i class="bx bx-x"></i>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>NIM</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="invalid-state" class="form-control" name="nim">
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            This is invalid state.
                                        </div>
                                        <div class="col-md-4">
                                            <label>Nama</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="email" id="email-id" class="form-control" name="nama">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-light-secondary" data-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Close</span>
                                </button>
                                <button type="submit" class="btn btn-primary ml-1" data-dismiss="modal">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Simpan</span>
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- BASIC MODAL -->

        </div>
    </div>
</div>
<!-- END: Content-->

<script type="text/javascript">
    $(document).ready(function() {

        var dataFull;
        var id = '';

        oTable = $('.dataTable').DataTable({
            processing: true,
            serverSide: true,
            scrollX: true,
            // lengthMenu: [15, 30],
            // order: [[0, "asc"], [1, "desc"]],
            // 'searching'   : true,
            // pagingType: 'numbers',
            language: {
                "search": "Pencarian : ",
                "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ Data",

            },
            ajax: {
                'type': 'GET',
                'url': '/admin/dashboard/',
                'dataSrc': function(json) {
                    return dataFull = json.data;
                },
            },
            columns: [{
                    data: 'mhsNiu',
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                },
                {
                    data: 'mhsNiu'
                },
                {
                    data: 'mhsNama'
                },
                {
                    data: 'mhsNama'
                },
                {
                    data: 'mhsNiu',
                    render: function(data, type, row, meta) {
                        return `<i class="bx bx-trending-up text-success align-middle mr-50"></i><span>30%</span>`;
                    }
                },
                {
                    data: 'mhsNiu',
                    render: function(data, type, row, meta) {
                        var btnEdit = `<a class="dropdown-item " id="btnEdit" data-toggle="modals" data-target="#default" data-id="${row.mhsNiu}"><i class="bx bx-edit-alt mr-1"></i> edit</a>`;
                        var btnDelete = `<a class="dropdown-item" id="btnDelete" data-id="${row.mhsNiu}"><i class="bx bx-trash mr-1"></i> delete</a>`;

                        return `<div class="dropdown">
                                <span class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(35px, 19px, 0px);">
                                    ${btnEdit}
                                    ${btnDelete}
                                </div>
                            </div>`;
                    }
                },
            ],
        });

        $(document).on('click', '#btnEdit', function(event) {
            id = $(this).data('id');

            find = dataFull.find(data => data.mhsNiu == id);
            console.log(find);

            $.each(find, function(indexInArray, valueOfElement) {
                $(`input[name="${indexInArray}"]`).val(valueOfElement);
            });

        });

        $('#formData').submit(function(e) {

            var data = new FormData(this);

            $.ajax({
                type: "POST",
                url: "<?= current_url() ?>/replace/" + id,
                data: data,
                dataType: "JSON",
                processData: false,
                contentType: false,
                beforeSend: function() {
                    cleanError();
                    btnLoading('.btnSimpan');
                },
                success: function(response) {
                    if (response.status == 'error') {
                        setError(response.errors);
                    } else {

                    }
                },
                complete: function() {
                    btnNormal('.btnSimpan');
                },
            });


        });

        $(document).on('click', '#btnDelete', function(event) {

            var id = $(this).data('id');

            $.ajax({
                type: "DELETE",
                url: "<?= current_url() ?>/delete/" + id,
                dataType: "JSON",
                beforeSend: function() {
                },
                success: function(response) {
                   
                },
                complete: function() {
                },
            });


        });


    });
</script>