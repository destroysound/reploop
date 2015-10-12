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
