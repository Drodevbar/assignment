<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>GRC</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>

        <div class="container">
            <div class="custom-wrapper">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="page-header">
                            <h1>Github repositories comparator</h1>
                        </div>
                        <hr class="my-3">
                        <p class="lead">Enter two repositories to compare them!</p>
                        <p class="lead">You can specify the repository by its link or name (format: author/repo).</p>
                        <hr class="my-3">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="form-inline">
                            <div class="form-group mb-2">
                                <span>Repository <strong>#1</strong></span>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="text" class="form-control" id="repo1_input" placeholder="Name or link">
                            </div>
                            <button id="repo1_button" class="btn btn-primary mb-2">Add</button>
                        </div>
                        <div class="form-inline">
                            <div class="form-group mb-2">
                                <span>Repository <strong>#2</strong></span>
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <input type="text" class="form-control" id="repo2_input" placeholder="Name or link">
                            </div>
                            <button id="repo2_button" class="btn btn-primary mb-2">Add</button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <table id="comparison" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Repository</th>
                                    <th id="repo1_name">#1</th>
                                    <th id="repo2_name">#2</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>Number of forks</th>
                                    <td id="repo1_forks"></td>
                                    <td id="repo2_forks"></td>
                                </tr>
                                <tr>
                                    <th>Number of stars</th>
                                    <td id="repo1_stars"></td>
                                    <td id="repo2_stars"></td>
                                </tr>
                                <tr>
                                    <th>Number of watchers</th>
                                    <td id="repo1_watchers"></td>
                                    <td id="repo2_watchers"></td>
                                </tr>
                                <tr>
                                    <th>Latest release date</th>
                                    <td id="repo1_latest_release"></td>
                                    <td id="repo2_latest_release"></td>
                                </tr>
                                <tr>
                                    <th>Number of open pull requests</th>
                                    <td id="repo1_open_pr"></td>
                                    <td id="repo2_open_pr"></td>
                                </tr>
                                <tr>
                                    <th>Number of closed pull requests</th>
                                    <td id="repo1_closed_pr"></td>
                                    <td id="repo2_closed_pr"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <footer class="col-lg-8 offset-lg-2">
                <hr class="my-1">
                Bartosz Drozd | <a href="mailto:bardrozg@gmail.com">bardrozg@gmail.com</a>
            </footer>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="/js/app.js"></script>
    </body>
</html>
