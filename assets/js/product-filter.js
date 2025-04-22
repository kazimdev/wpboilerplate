(function ($) {
  $(document).ready(function () {
    // Hide/Show Filter Panel
    $(document).on("click", ".wpboilerplate-filter-button", function (e) {
      $(".wpboilerplate-woo-sidebar-overlay").addClass("show");
    });

    $(document).on("click", ".wpboilerplate-woo-sidebar .close", function (e) {
      $(".wpboilerplate-woo-sidebar-overlay").removeClass("show");
    });

    $(".wpboilerplate-woo-sidebar-overlay").click(function (e) {
      var wooSideBar = $(".wpboilerplate-woo-sidebar");
      if (!wooSideBar.is(e.target) && wooSideBar.has(e.target).length === 0) {
        $(".wpboilerplate-woo-sidebar-overlay").removeClass("show");
      }
    });

    // List View / Grid View
    $(document).on("click", ".wpboilerplate-layout-view .list-view", function () {
      $(".wpboilerplate-product-cat").addClass("list");
    });
    $(document).on("click", ".wpboilerplate-layout-view .grid-view", function () {
      $(".wpboilerplate-product-cat").removeClass("list");
    });

    // Function for Filter Products with Ajax call
    function wpboilerplateFilterProducts(paged = 1) {
      $("ul.products").html("<div class='wpboilerplate-loader'>Loading...</div>");

      var brandFilters = [];
      var sizeFilters = [];
      var packSizeFilters = [];

      $(".brand-filter input[type=checkbox]:checked").each(function () {
        brandFilters.push($(this).val());
      });

      $(".size-filter input[type=checkbox]:checked").each(function () {
        sizeFilters.push($(this).val());
      });

      $(".pack-size-filter input[type=checkbox]:checked").each(function () {
        packSizeFilters.push($(this).val());
      });

      $.ajax({
        type: "GET",
        url: wc_add_to_cart_params.ajax_url,
        data: {
          action: "wpboilerplate_filter_products",
          current_url: window.location.href,
          paged: paged,
          in_stock: $("input#in_stock:checked").val(),
          out_stock: $("input#stock_out:checked").val(),
          new: $("input#filter_new:checked").val(),
          offer: $("input#filter_offer:checked").val(),
          popular: $("input#filter_popular:checked").val(),
          min_price: $("input#min_price").val(),
          max_price: $("input#max_price").val(),
          color: $(".colour-filter li.active").text(),
          brand: brandFilters,
          size: sizeFilters,
          pack_size: packSizeFilters,
          sort_by: $("select[name='wpboilerplate_orderby']").val(),
        },
        success: function (res) {
          // console.log(res);
          $("ul.products").html(res.products);

          var plural_s = res.showing_items == 1 ? "" : "s";
          var showing_items_html =
            "Showing " + parseInt(res.showing_items) + " item" + plural_s;

          $(".woocommerce-header-area-wrap .woocommerce-result-count").html(
            showing_items_html
          );

          $(".woocommerce-pagination").html(res.pagination);
        },
        error: function (err) {
          console.log(err);
        },
      });
    }

    // Filter + Pagination (Ajax)
    $(document).on("click", ".woocommerce-pagination a.page-numbers", function (e) {
      e.preventDefault();

      var paged = $(this).text();

      if ($(this).hasClass("next")) {
        paged = parseInt($(".woocommerce-pagination .current").text()) + 1;

      } else if ($(this).hasClass("prev")) {
        paged = parseInt($(".woocommerce-pagination .current").text()) - 1;
      }

      wpboilerplateFilterProducts(paged);

    });

    // Filter products by availibility, price range, attributes
    $(".wpboilerplate-filter-box").on("click", "input, li", function (e) {
      $(".wpboilerplate-woo-sidebar .clear-all").show();

      if (e.target.tagName.toLowerCase() === "li") {
        $(this)
          .closest(".wpboilerplate-filter-box")
          .find("li")
          .removeClass("active");
        $(this).addClass("active");
      }

      wpboilerplateFilterProducts();
    });

    // Products Sort By
    $("select[name='wpboilerplate_orderby']").on("change", function () {
      $(".wpboilerplate-woo-sidebar .clear-all").show();
      wpboilerplateFilterProducts();
    });

    // Price Filter
    $("#min_price, #max_price").on("change", function () {
      $(".wpboilerplate-woo-sidebar .clear-all").show();

      adjustPriceRangeOnSlide();
      wpboilerplateFilterProducts();
    });

    $("#min_price,#max_price").on("paste keyup", function () {
      $(".wpboilerplate-woo-sidebar .clear-all").show();

      adjustPriceRangeOnWrite();
      wpboilerplateFilterProducts();
    });

    function adjustPriceRangeOnSlide() {
      var min_price_range = parseInt($("#min_price").val());

      var max_price_range = parseInt($("#max_price").val());

      if (min_price_range > max_price_range) {
        $("#max_price").val(min_price_range);
      }

      $("#slider-range").slider({
        values: [min_price_range, max_price_range],
      });
    }

    function adjustPriceRangeOnWrite() {
      var min_price_range = parseInt($("#min_price").val());

      var max_price_range = parseInt($("#max_price").val());

      if (min_price_range == max_price_range) {
        max_price_range = min_price_range + 100;

        $("#min_price").val(min_price_range);
        $("#max_price").val(max_price_range);
      }

      $("#slider-range").slider({
        values: [min_price_range, max_price_range],
      });
    }

    $(function () {
      $("#slider-range").slider({
        range: true,
        orientation: "horizontal",
        min: 0,
        max: 1000,
        values: [0, 1000],
        step: 1,

        slide: function (event, ui) {
          if (ui.values[0] == ui.values[1]) {
            return false;
          }

          $("#min_price").val(ui.values[0]);
          $("#max_price").val(ui.values[1]);

          $(".wpboilerplate-woo-sidebar .clear-all").show();

          wpboilerplateFilterProducts();
        },
      });

      $("#min_price").val($("#slider-range").slider("values", 0));
      $("#max_price").val($("#slider-range").slider("values", 1));
    });
  });
})(jQuery);
