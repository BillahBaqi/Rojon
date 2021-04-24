<footer class="sl-footer">
  <div class="footer-left">
    <div class="mg-b-2">Copyright © 2021. Rojon. All Rights Reserved.</div>
    <div>Made by BaqiBillah.</div>
  </div>
  <div class="footer-right d-flex align-items-center">
    <span class="tx-uppercase mg-r-10">Share:</span>
    <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/starlight"><i class="fa fa-facebook tx-20"></i></a>
    <a target="_blank" class="pd-x-5" href="https://twitter.com/home?status=Starlight,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/starlight"><i class="fa fa-twitter tx-20"></i></a>
  </div>
</footer>

<script src="../assets/lib/jquery/jquery.js"></script>
<script src="../assets/lib/popper.js/popper.js"></script>
<script src="../assets/lib/bootstrap/bootstrap.js"></script>
<script src="../assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="../assets/lib/highlightjs/highlight.pack.js"></script>
<script src="../assets/lib/datatables/jquery.dataTables.js"></script>
<script src="../assets/lib/medium-editor/medium-editor.js"></script>
<script src="../assets/lib/summernote/summernote-bs4.min.js"></script>
<script src="../assets/js/show.password.js"></script>
<script>
  $(function() {
    'use strict';

    // Inline editor
    var editor = new MediumEditor('.editable');

    // Summernote editor
    $('#summernote').summernote({
      height: 150,
      tooltip: false
    })
  });
</script>


<script>
  $(function() {
    'use strict';

    $('#datatable1').DataTable({
      responsive: true,
      language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_ items/page',
      }
    });

    $('#datatable2').DataTable({
      bLengthChange: false,
      searching: false,
      responsive: true
    });

    // Select2
    $('.dataTables_length select').select2({
      minimumResultsForSearch: Infinity
    });

  });
</script>
<script src="../assets/lib/datatables-responsive/dataTables.responsive.js"></script>
<script src="../assets/lib/select2/js/select2.min.js"></script>
<script src="../assets/js/starlight.js"></script>

</body>

</html>