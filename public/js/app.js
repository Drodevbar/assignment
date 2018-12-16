$("#repo1_button").click(() => handleButtonClick(1));
$("#repo2_button").click(() => handleButtonClick(2));

function handleButtonClick(number) {
    let input = $("#repo" + number + "_input").val();
    let parts = input.split("/");

    if (parts.length < 2) {
        alert("Please provide valid repository via its name or link.");
        return;
    }

    let owner = parts[parts.length - 2];
    let repo = parts[parts.length - 1];

    $.ajax({
        url: "/api/repository/" + owner + "/" + repo,
        type: "GET",
        statusCode: {
            200: (response) => {
                $("#repo" + number + "_name").empty().text(owner + "/" + repo);
                $("#repo" + number + "_forks").empty().text(response.forks_count);
                $("#repo" + number + "_stars").empty().text(response.stars_count);
                $("#repo" + number + "_watchers").empty().text(response.watchers_count);
                $("#repo" + number + "_latest_release").empty().text(response.latest_release_date);
                $("#repo" + number + "_open_pr").empty().text(response.open_pull_requests_count);
                $("#repo" + number + "_closed_pr").empty().text(response.closed_pull_requests_count);
            },
            404: (response) => {
                alert(response.responseJSON.message);
            }
        }
    });
}
