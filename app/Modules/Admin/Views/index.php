
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
                                <li class="breadcrumb-item active">Fixed Navbar <?php echo @$tes ?></li>
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
                    <div class="card-body">
                        <div class="card-text">
                            <p>The fixed navbar layout has a fixed navbar and navigation menu and footer. Only navbar section is fixed to user. In this page you can experience it.</p>
                        </div>
                        <div>
                            <?php echo $formInput ?>
                        </div>
                    </div>
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
                        <div class="modal-header">
                            <h3 class="modal-title" id="myModalLabel1">Basic Modal</h3>
                            <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                                <i class="bx bx-x"></i>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>
                                Bonbon caramels muffin. Chocolate bar oat cake cookie pastry dragée pastry. Carrot cake
                                chocolate tootsie roll chocolate bar candy canes biscuit.

                                Gummies bonbon apple pie fruitcake icing biscuit apple pie jelly-o sweet roll. Toffee sugar
                                plum sugar plum jelly-o jujubes bonbon dessert carrot cake. Cookie dessert tart muffin topping
                                donut icing fruitcake. Sweet roll cotton candy dragée danish Candy canes chocolate bar cookie.
                                Gingerbread apple pie oat cake. Carrot cake fruitcake bear claw. Pastry gummi bears
                                marshmallow jelly-o.
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="button" class="btn btn-primary ml-1" data-dismiss="modal">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Accept</span>
                            </button>
                        </div>
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

    oTable = $('.dataTable').DataTable({
        processing: true,
        serverSide: true,
        scrollX: true,
            // lengthMenu: [15, 30],
            // order: [[0, "asc"], [1, "desc"]],
            // 'searching'   : true,
            // pagingType: 'numbers',
            language:{
                "search":"Pencarian : ",
                "info":           "Menampilkan _START_ sampai _END_ dari _TOTAL_ Data",

            },
            ajax: {
                'type' : 'GET',
                'url' : '/home/',
                'dataSrc': function(json)
                {
                    return dataFull = json.data;
                },
            },
            columns: [
            {
                data: 'mhsNiu', render: function (data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {data: 'mhsNiu'},
            {data: 'mhsNama'},
            {data: 'mhsNama'},
            {
                data: 'mhsNiu', render: function (data, type, row, meta) {
                    return `<i class="bx bx-trending-up text-success align-middle mr-50"></i><span>30%</span>`;
                }
            },
            {
                data: 'mhsNiu', render: function (data, type, row, meta) {
                    var btnEdit = `<a class="dropdown-item" data-toggle="modal" data-target="#default"><i class="bx bx-edit-alt mr-1"></i> edit</a>`;
                    var btnDelete = `<a class="dropdown-item"><i class="bx bx-trash mr-1"></i> delete</a>`;

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
});
</script>