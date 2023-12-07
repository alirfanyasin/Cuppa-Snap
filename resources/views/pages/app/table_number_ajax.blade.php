<script>
  function getData() {
    $.get("{{ url('app/table-number/read') }}", {}, function(data, status) {
      $('#dataTableNumber').html(data);
    });
  }

  $(document).ready(function() {
    console.log("Document is ready. Calling getData()...");
    getData();

    $('#form').on('submit', function(event) {
      event.preventDefault();
      var formData = new FormData(this);

      $.ajax({
        type: 'POST',
        url: '{{ route('app.table_number.store') }}',
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
          $('#createTableModal').modal('hide');
          getData();
          $('#form')[0].reset(); // Assuming your form has the ID 'form'
        },
        error: function(xhr, status, error) {
          console.error("Error:", error);
          console.error("Response:", xhr.responseText);
        }
      });
    });
  });
</script>
