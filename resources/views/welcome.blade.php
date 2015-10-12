<!DOCTYPE html>
<html>
    <head>
        <title>Reputation Loop API Consumer</title>

        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="http://ajax.aspnetcdn.com/ajax/knockout/knockout-3.1.0.js"></script>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script type="text/javascript">
          var boundData = {
            'page': ko.observable(0),
            'no_of_pages': ko.observable(0),
            'reviews': ko.observable([]),
            'pages': ko.observable([]),
            'business_info': ko.observable({
              'business_address': '',
              'business_name': '',
              'business_phone': '',
              'external_page_url': '',
              'external_url': '',
              'total_rating': {
                'total_avg_rating': ''
              }
            })
          };
          boundData.paginator = function(page, no_of_pages) {
	  };
          function getPage(page) {
            $.get("/api", {'page': page}, function (data) {
                boundData.page(page);
                boundData.business_info(data.business_info);
                boundData.no_of_pages(Math.ceil(data.business_info.total_rating.total_no_of_reviews/10));
                boundData.reviews(data.reviews);
                var begin_page = page - 3;
                if (begin_page < 0) {
                  begin_page = 0;
                }
                end_page = begin_page + 6;
                if (end_page > boundData.no_of_pages()) {
                  end_page = boundData.no_of_pages();
                }
                var arr = [];
                for (var i = begin_page; i < end_page; i++) {
                  arr.push(i);
                }
                boundData.pages(arr);
	    });
          }
          $(function () {
            getPage(0);
            ko.applyBindings(boundData);
          });
        </script>
    </head>
    <body>
       <h1 data-bind="text: business_info.business_name"></h1>
       <div class="container">
          <div class="row">
            <div class="col-md-6" data-bind="html: business_info.business_address"></div>
            <div class="col-md-6" data-bind="html: business_info.business_phone"></div> 
          </div>
       </div>
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
                <div class="col-md-12" data-bind="html: description"></div>
           </div>
       </div>
       <nav>
       <ul class="pagination" data-bind="foreach: pages">
           <li data-bind="text: $data+1, click: function (data) { getPage($data) }"></li>
       </ul>
       </nav>
       </div>
    </body>
</html>
