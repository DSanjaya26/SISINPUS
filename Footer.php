<footer class="footer">
        <div class="container">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="https://smpnuruliman.sch.id/" target="_blank">
                            SMP Nurul Iman Jakarta Timur
                        </a>
                    </li>
					
                </ul>
            </nav>
            <div class="copyright pull-right">
                Copyright &copy; <script>document.write(new Date().getFullYear())</script> SMP Nurul Iman
            </div>
        </div>
    </footer>
<!-- Advance Search Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<i class="material-icons">clear</i>
					</button>
					<h4 class="modal-title">Advance Search</h4>
				</div>
				<div class="modal-body">
					<form method="GET" action="">
						<div id="inputs">
							<div class="row">
								<div class="col-lg-12">
									<div class="form-group">
										<input type="text" value="" placeholder="Judul Buku" class="form-control" name="judul">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<input type="text" value="" placeholder="Pengarang" class="form-control" name="pengarang">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<input type="text" value="" placeholder="Penerbit" class="form-control" name="penerbit">
									</div>
								</div>
								
							</div>
						</div>
				<!--end inputs -->
				</div>
				<div class="modal-footer">
					<input type="submit" class="btn btn-info btn-raised btn-round btn-block" value="Search" name="Search">
				</div>
					</form>
			</div>
		</div>
	</div>
	<!--  End Modal -->
</body>

	<!--   Core JS Files   -->
	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js"></script>

	<!--    Plugin for Date Time Picker and Full Calendar Plugin   -->
	<script src="assets/js/moment.min.js"></script>

	<!--	Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/   -->
	<script src="assets/js/nouislider.min.js" type="text/javascript"></script>

	<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker   -->
	<script src="assets/js/bootstrap-datetimepicker.js" type="text/javascript"></script>

	<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select   -->
	<script src="assets/js/bootstrap-selectpicker.js" type="text/javascript"></script>

	<!--	Plugin for Tags, full documentation here: http://xoxco.com/projects/code/tagsinput/   -->
	<script src="assets/js/bootstrap-tagsinput.js"></script>

	<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput   -->
	<script src="assets/js/jasny-bootstrap.min.js"></script>

	<!--    Plugin For Google Maps   -->
	<script  type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

	<!--    Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc    -->
	<script src="assets/js/material-kit.js?v=1.2.1" type="text/javascript"></script>
	<!--  DataTables.net Plugin    -->
	<script src="assets/js/jquery.datatables.js"></script>
	<script type="text/javascript">

		$(document).ready(function(){
			var slider = document.getElementById('sliderRegular');

	        noUiSlider.create(slider, {
	            start: 40,
	            connect: [true,false],
	            range: {
	                min: 0,
	                max: 100
	            }
	        });

	        var slider2 = document.getElementById('sliderDouble');

	        noUiSlider.create(slider2, {
	            start: [ 20, 60 ],
	            connect: true,
	            range: {
	                min:  0,
	                max:  100
	            }
	        });



			materialKit.initFormExtendedDatetimepickers();

		});
	</script>
	<script type="text/javascript">
    $(document).ready(function() {
        $('#datatables').DataTable({
            "pagingType": "full_numbers",
            "dom": '<"bottom"f>rt<"top"p><"clear">',
            "pageLength": 5,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]

            ],
            "lengthChange": false,
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search Book",
            }

        });


        var table = $('#datatables').DataTable();

        

        $('.card .material-datatables label').addClass('form-group');
    });
  
</script>
<script type="text/javascript">
        $("#submit").click(function () {
            var kode = $("#kode").val();
            var str = "You Have Entered " 
                + "Name: " + kode
                 $("#modal_body").html(str);
        });
    </script>
</html>
