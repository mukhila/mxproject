<!DOCTYPE html>
<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr">
    @include('layouts.header')
    <body>
        <div class="layout-wrapper layout-content-navbar">
            <div class="layout-container">
                @include('layouts.companyusers_sidemenu')
                <div class="layout-page">
                    @include('layouts.navbar')
                    <div class="content-wrapper">
                        @yield('content')
                        @include('layouts.footer')
                    </div>
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
        @include('layouts.scripts')
        @include('layouts.popupscripts')

        <script>
  $images = $('#categoryiconimage')
    $(".imageUpload").change(function(event){
        readURL(this);
    });

    function readURL(input) {

if (input.files && input.files[0]) {
    
    $.each(input.files, function() {
        var reader = new FileReader();
        reader.onload = function (e) {           
            $images.html('<img src="'+ e.target.result+'" />')
        }
        reader.readAsDataURL(this);
    });
    
}
}


</script>

    </body>
</html>
