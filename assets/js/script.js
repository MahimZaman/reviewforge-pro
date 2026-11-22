jQuery(document).on("submit", ".rf-review-form", function (e) {
  e.preventDefault();

  let form = jQuery(this);

  jQuery.post(
    rf_ajax.url,
    {
      action: "rf_submit_review",
      post_id: form.find("[name=post_id]").val(),
      rating: form.find("[name=rating]").val(),
      name: form.find("[name=name]").val(),
      review: form.find("[name=review]").val(),
    },
    function (res) {
      alert(res.data.message);
    },
  );
});
