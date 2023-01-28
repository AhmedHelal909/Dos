@if (session('success'))
   <script>
        $(document).ready(function() {
            Lobibox.notify(
                'success', {
                    title: '{{ session()->get('success') }}',
                    msg: 'Wait...',
                    size: 'mini',
                    delay: 5000,
                    closeOnClick: true,
                    position: "top right"
                }
            );

        });
    </script>
@endif
