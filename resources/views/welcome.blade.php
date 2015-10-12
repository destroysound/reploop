<!DOCTYPE html>
<html>
    <head>
        <title>Reputation Loop API Consumer</title>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha256-Sk3nkD6mLTMOF0EOpNtsIry+s1CsaqQC1rVLTAy+0yc= sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/knockout/knockout-3.1.0.js"></script>
        <script type="text/javascript">
            $(function () {
                function getPage(page) {
                    $.get("/api", {'page': page}, function (data) {
                        data.page = page;
                        data.no_of_pages = Math.ceil(data.business_info.total_rating.total_noof_reviews/10)
                        console.log(data);
                        ko.applyBindings(data);
                    });
                }
                getPage(0);
            });
        </script>
    </head>
    <body>
       <div class="container">
       <div data-bind="foreach: reviews">
           <div class="row">
                <div class="col-md-4">Customer Name:</div>
                <div class="col-md-4" data-bind="text: customer_name"></div>
           </div>
           <div class="row">
                <div class="col-md-4">Date of Submission:</div>
                <div class="col-md-4" data-bind="text: date_of_submission"></div>
           </div>
           <div class="row">
                <div class="col-md-12" data-bind="text: description"></div>
           </div>
       </div>
       <ul class-"pagination" data-bind="foreach: new Array(no_of_pages)">
           <li data-bind="text: $index()+1"></li>
       </ul>
       </div>
    </body>
</html>
