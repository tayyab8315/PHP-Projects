
<div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop" aria-labelledby="offcanvasTopLabel">
  <div class="offcanvas-header">
    <h5 id="offcanvasTopLabel">Offcanvas top</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
  <h1>Submit Data</h1>
    <input type="text" id="dataInput" placeholder="Enter data">
    <button id="submitButton">Submit</button>
    <div id="result"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#submitButton').click(function() {
                var inputData = $('#dataInput').val();

                $.ajax({
                    type: 'POST',
                    url: 'process.php', // PHP script to handle the data
                    data: { data: inputData },
                    success: function(response) {
                        $('#result').html(response); // Display the response on the page
                    }
                });
            });
        });
    </script>


 </div>
  </div>
</div>


 
