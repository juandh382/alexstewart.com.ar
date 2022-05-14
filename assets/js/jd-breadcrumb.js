$(document).ready(function () {
  const toggleTablesContainers = () => {
    $('[data-id="table-analysis"] .table-wrapper').each(function () {
      !$(this).hasClass("active") ? $(this).hide() : $(this).show();
    });
  };

  toggleTablesContainers();

  $('[data-table="table-analysis"] .breadcrumb-item').click(function () {
    $(
      '[data-id="table-analysis"] .table-wrapper, [data-table="table-analysis"] .breadcrumb-item'
    ).removeClass("active");

    $(
      `[data-id="${$(this).find("a").attr("data-target")}"].table-wrapper`
    ).addClass("active");

    $(this).addClass("active");

    toggleTablesContainers();
  });
});
