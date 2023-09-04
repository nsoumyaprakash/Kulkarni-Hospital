<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        <strong><span>Kulkarni Medzone</span></strong>
    </div>
    <div class="copyright">
        &copy; Copyright 2023 <strong><span>iKonTel Solutions Pvt.Ltd.</span> | Privacy Policy</strong>
    </div>
</footer>
<!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Template Main JS and other JS Files -->
<script src="../js/main.js"></script>

<script>
$(document).ready(() => {
    // Date Picker
    $(".datePicker").datepicker({
        dateFormat: "dd-M-yy"
    });
    $(".datePicker").datepicker('setDate', new Date());

    // Data Table
    $('.datatable').DataTable();

})
</script>


</body>

</html>