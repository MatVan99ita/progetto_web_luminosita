<?php if(isset($templateParams["titolo_pagina"])): ?>
    <h2><?php echo $templateParams["titolo_pagina"]; ?></h2>
<?php endif;?>
<form action="#" method="POST">
            <h2>Crea un account</h2>
            <?php if(isset($templateParams["errorelogin"])): ?>
            <p><?php echo $templateParams["errorelogin"]; ?></p>
            <?php endif; ?>
            <ul>
                <li>
                    <label for="username">Nome:</label><input type="text" id="username" name="username" />
                </li>
                <li>
                    <label for="username">Cognome:</label><input type="text" id="username" name="username" />
                </li>
                <li>
                    <label for="username">Email:</label><input type="text" id="username" name="username" />
                </li>
                <li>
                    <label for="password">Password:</label><input type="password" id="password" name="password" />
                </li>
                <li>
                    <input type="submit" name="submit" value="Invia" />
                </li>
            </ul>
        </form>