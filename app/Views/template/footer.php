<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix mb-0"><span class="float-left d-inline-block">2020 &copy; PIXINVENT</span><span class="float-right d-sm-inline-block d-none">Crafted with<i class="bx bxs-heart pink mx-50 font-small-3"></i>by<a class="text-uppercase" href="https://1.envato.market/pixinvent_portfolio" target="_blank">Pixinvent</a></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="bx bx-up-arrow-alt"></i></button>
    </p>
</footer>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.js"></script>
<script src="/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.js"></script>
<script src="/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
<script src="/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="/app-assets/vendors/js/ui/prism.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="/app-assets/js/scripts/configs/vertical-menu-light.js"></script>
<script src="/app-assets/js/core/app-menu.js"></script>
<script src="/app-assets/js/core/app.js"></script>

<!-- BEGIN: Page Vendor JS-->
<script src="/app-assets/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
<!-- END: Page Vendor JS-->
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<!-- END: Page JS-->

<script>
    $(document).ready(function() {

        var isDark = window.localStorage.getItem('theme') == 'dark';

        if (isDark) {
            $('.main-menu').removeClass('menu-light').addClass('menu-dark');
            $('.navbar-sticky').addClass('dark-layout');
            $('.header-navbar').addClass('navbar-dark');

            $('#changeTheme').attr('checked', true);
        }

        $('#changeTheme').on('click', function() {

            if ($('.main-menu').hasClass('menu-light')) {
                $('.main-menu').removeClass('menu-light').addClass('menu-dark');
                $('.navbar-sticky').addClass('dark-layout');
                $('.header-navbar').addClass('navbar-dark');
                window.localStorage.setItem('theme', 'dark');

            } else {
                $('.main-menu').removeClass('menu-dark').addClass('menu-light');
                $('.navbar-sticky').removeClass('dark-layout');
                $('.header-navbar').removeClass('navbar-dark');

                window.localStorage.setItem('theme', 'light');

            }
        });

        <?php echo "";
        echo ""; ?>

    });

    function setError(errors) {
        $.each(errors, function(indexInArray, valueOfElement) {
            $(`[name="${indexInArray}"]`).addClass('is-invalid');
            $(`.${indexInArray}`).html(valueOfElement);
        });
    }

    function cleanError() {
        $('.is-invalid').removeClass('is-invalid');
        $('.invalid-feedback').html('');
    }

    var btnText;

    function btnLoading(selector) {
        btnText = $(selector).html();
        $(selector).html('<i class="fa fa-spinner fa-spin"></i> Loading .....');
        $(selector).attr('disabled', 'true');
    }

    function btnNormal(selector) {
        $(selector).html(btnText);
        $(selector).removeAttr('disabled');
    }
</script>

</body>
<!-- END: Body-->

</html>