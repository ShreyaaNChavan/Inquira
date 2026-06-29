<?php
session_start();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <a class="navbar-brand" href="./">
            <img src="./public/logo.png" alt="Logo">
        </a>

        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link active" href="./">
                        Home
                    </a>
                </li>

                <?php if (isset($_SESSION['user'])) { ?>

                    <li class="nav-item">
                        <a class="nav-link" href="./server/requests.php?logout=true">
                            Logout [<?php echo ucfirst( $_SESSION['user']['username'] ) ?>]
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="?ask=true">
                            Ask a Question
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link " href="?u-id=<?php echo $_SESSION['user']['user_id'] ?>">
                            My Questions
                        </a>
                    </li>

                <?php } else { ?>

                    <li class="nav-item">
                        <a class="nav-link" href="?login=true">
                            Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="?signup=true">
                            Signup
                        </a>
                    </li>

                <?php } ?>


                <li class="nav-item">
                    <a class="nav-link" href="?latest=true">
                        Latest Questions
                    </a>
                </li>

            </ul>



        </div>
        <form class="d-flex" action="">
            <input class="form-control me-2 " type="search" name="search" placeholder="Search a Question">
            <button class="btn btn-outline-success btn search-btn" type="submit">Search</button>
        </form>
    </div>
</nav>