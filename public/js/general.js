$( document ).ready(function() {

    /*
    | DIALOGS
     */

    // TODO: Get base url


    // Settings
    $("#content").append('<div id="dialog"></div>');
    $( "#dialog" ).dialog({ autoOpen: false });

    // LOGIN
    $('#login-btn').on("click", function() {

        $("#dialog").dialog( "option", "title", "Login" );

        var loginForm = [
            '<form action="http://localhost:8888/thewall/public/user/login" method="post">',
                '<ul>',
                    '<li class="field"><input class="medium input" placeholder="Email" type="text" name="email" /></li>',
                    '<li class="field"><input class="medium input"  placeholder="Password"  type="password" name="password" /></li>',
                    '<li class="field"><input class="btn primary pretty" style="color:white; height:30px; width:90px;"  type="submit" value="Login"></li>',
                    '</ul>',
                '</form>'
        ].join("\n");

        $("#dialog").html(loginForm);

        $("#dialog" ).dialog( "open" );
 
    });

    // CREATE USER
    $('#create-btn').on("click", function() {
        $("#dialog").dialog( "option", "title", "Create Account" );

        var createUserForm = [
            '<form action="http://localhost:8888/thewall/public/user/create" method="post">',
            '<ul>',
            '<li class="field"><input class="medium input" placeholder="Email" type="text" name="email" /></li>',
            '<li class="field"><input class="medium input"  placeholder="Password"  type="password" name="password" /></li>',
            '<li class="field"><input class="btn primary pretty" style="color:white; height:30px; width:90px;"  type="submit" value="Create"></li>',
            '</ul>',
            '</form>'
        ].join("\n");

        $("#dialog").html(createUserForm);
        $("#dialog" ).dialog( "open" );
    });
});

