var boundData = {
  'page': ko.observable(0),
  'no_of_pages': ko.observable(0),
  'reviews': ko.observable([]),
  'pages': ko.observable([]),
  'business_address': ko.observable(''),
  'business_name': ko.observable(''),
  'business_phone': ko.observable(''),
  'external_page_url': ko.observable(''),
  'rating': ko.observable(''),
  'source_images': {
     0: '/img/local.png',
     1: '/img/google.png',
     2: '/img/yelp.png'
   },
  'no_reviews': ko.observable('')
};

function getPage(page) {
  $.get("/api", {'page': page}, function (data) {
    boundData.page(page);
    boundData.business_address(data.business_info.business_address);
    boundData.business_name(data.business_info.business_name);
    boundData.business_phone(data.business_info.business_phone);
    boundData.external_page_url(data.business_info.external_page_url);
    boundData.rating(data.business_info.total_rating.total_avg_rating);
    boundData.no_reviews(data.business_info.total_rating.total_no_of_reviews);
    boundData.no_of_pages(Math.ceil(data.business_info.total_rating.total_no_of_reviews/10));
    boundData.reviews(data.reviews);
    var begin_page = page - 2;
    if (begin_page < 0) {
      begin_page = 0;
    }
    end_page = begin_page + 5;
    if (end_page > boundData.no_of_pages()) {
      end_page = boundData.no_of_pages();
    }
    if (end_page - begin_page < 5) {
      begin_page = end_page - 5;
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
