<DOCTYPE html>
    <html>

    <style>
        <?php include 'style.css'; ?>
    </style>

    <head>
        <title>PHP Test</title>
        <h class="center title_text">ROCK PAPER SCISSORS</h>
    </head>

    <body>


        <div id="form" align="center">
            <form action="" method="POST">
                <input type="submit" src="rock.png" class="main_button rock button_style" name="user_option" value="rock" onclick="this.form.submit();">
                <input type="submit" src="paper.png" class="main_button paper button_style" name="user_option" value="paper" onclick="this.form.submit();">
                <input type="submit" src="scissors.png" class="main_button scissors button_style" name="user_option" value="scissors" onclick="this.form.submit();">
            </form>
        </div>



        <?php
        //options availbe used for ai decission making
        $options = array("rock", "paper", "scissors");

        //code to return back value of user choice from input of clicked image
        $users_choice = $_POST["user_option"];




        //main running of program
        user_playes($options, $users_choice, ai_choice($options));





        //function to determine ai choice
        function ai_choice($options)
        {
            return $options[array_rand($options, 1)];
        }


        //MAIN function to run the program
        function user_playes($options, $users_choice, $ai_choice)
        {
            output_results(compare_player_vs_ai($users_choice, $ai_choice), $users_choice, $ai_choice);
        }


        //function to determine the winner and return the results
        function compare_player_vs_ai($users_choice, $ai_choice)
        {
            if ($users_choice === $ai_choice) {
                $result = "-1"; //-1 means draw
            } else if ($users_choice == "rock" && $ai_choice == "paper") {
                $result = "0"; //0 means user wins 1 means ai wins
            } else if ($users_choice == "rock" && $ai_choice == "scissors") {
                $result = "1";
            } else if ($users_choice == "paper" && $ai_choice == "rock") {
                $result = "0";
            } else if ($users_choice == "paper" && $ai_choice == "scissors") {
                $result = "1";
            } else if ($users_choice == "scissors" && $ai_choice == "paper") {
                $result = "0";
            } else if ($users_choice == "scissors" && $ai_choice == "rock") {
                $result = "1";
            } else {
                return null;
            }
            return $result;
        }


        //function to output results and images
        function output_results($result, $users_choice, $ai_choice)
        {
            $outputted_message = "";
            //echo $result;
            if ($result == "-1") {
                $outputted_message = "it was a draw!";
                echo "<p class='center result_text'>$users_choice draws against $ai_choice</p>";
                echo "<img class ='center output_images' src='draw.jpeg'>";
            } else if ($result == "0") {
                $outputted_message = "you Won!!!!";
                echo "<p class='center result_text'>$users_choice won against $ai_choice</p>";
                echo "<img class ='center output_images' src='win.png'>";
            } else {
                $outputted_message = "somehow XD you lost to a very bad ai";
                echo "<p class='center result_text'>$users_choice lost against $ai_choice</p>";
                echo "<img class ='center output_images' src='lose.jpeg'>";
            }
            echo "<p class='center result_text'>$outputted_message</p>";
        }

        ?>

    </body>

    </html>