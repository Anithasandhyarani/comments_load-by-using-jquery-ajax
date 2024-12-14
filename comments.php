<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Comments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <form id="frm">
        <div class="container mt-4">
            <h2>Show Comments</h2>

            <div id="comments"></div>

            <input type="button" class="btn btn-primary" value="Show Comments" id="btn">
        </div>
    </form>

    <script>
        $(document).ready(function() {
            var commentCount = 0;


            function loadComments() {
                $.ajax({
                    type: "POST",
                    url: "comments_load.php",
                    data: {
                        comment: commentCount
                    },
                    success: function(data) {
                        if (data) {
                            $("#comments").append(data);

                            commentCount += 2;
                        } else {

                            $("#btn").val("No more comments to show");
                        }
                    }
                });
            }


            loadComments();


            $("#btn").click(function() {
                loadComments();
            });
        });
    </script>
</body>

</html>