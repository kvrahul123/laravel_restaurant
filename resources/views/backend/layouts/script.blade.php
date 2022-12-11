<script type="text/javascript">

$('.status_change').change(function() {
     var mode = $(this).prop('checked');
     var id=$(this).data('id');
      $.ajax({
        url: "{{route('banner.status_update')}}",
        type: "POST",
        data: {
            _token: '{{csrf_token()}}',
            mode: mode,
            id: id,
        },
        success: function(response) {
         
        }
    })
});

$('.event_status').change(function() {
     var mode = $(this).prop('checked');
     var id=$(this).data('id');
      $.ajax({
        url: "{{route('event.event_status')}}",
        type: "POST",
        data: {
            _token: '{{csrf_token()}}',
            mode: mode,
            id: id,
        },
        success: function(response) {
         
        }
    })
});


$('.aboutus_status').change(function() {
     var mode = $(this).prop('checked');
     var id=$(this).data('id');
      $.ajax({
        url: "{{route('aboutus.aboutus_status')}}",
        type: "POST",
        data: {
            _token: '{{csrf_token()}}',
            mode: mode,
            id: id,
        },
        success: function(response) {
         
        }
    })
});

$('.category_status').change(function() {
     var mode = $(this).prop('checked');
     var id=$(this).data('id');
      $.ajax({
        url: "{{route('category.category_status')}}",
        type: "POST",
        data: {
            _token: '{{csrf_token()}}',
            mode: mode,
            id: id,
        },
        success: function(response) {
         
        }
    })
});


  $('.delete_btn').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Are you sure you want to delete this record?`,
              text: "If you delete this, it will be gone forever.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });

</script>