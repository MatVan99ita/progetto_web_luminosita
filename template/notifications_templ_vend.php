<div bgcolor="#f6f6f6" style="color: #333; height: 100%; width: 100%;" height="100%" width="100%">
    <table bgcolor="#f6f6f6" cellspacing="0" style="border-collapse: collapse; padding: 40px; width: 100%;" width="100%">
        <tbody>
            <tr>
                <td width="5px" style="padding: 0;"></td>
                <td style="clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 10px 0;">
                    <table width="100%" cellspacing="0" style="border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <td style="padding: 0;">
                                    <a
                                        href="#"
                                        style="color: #348eda;"
                                        target="_blank"
                                    >
                                        <img
                                            src="<?php echo LOGO."scuro.png"; ?>"
                                            alt="lumininosita.food logo"
                                            style="height: 125px; max-width: 100%; width: 125px;"
                                            height="50"
                                            width="157"
                                        />
                                    </a>
                                </td>
                                <td style="color: #999; font-size: 12px; padding: 0; text-align: right;" align="right">
                                    Luminosita<br />
                                    Invoice <?php echo substr($templateParams["mail"]["obj"], 16, 7); ?><br />
                                    <?php echo $templateParams["mail"]["spedita"]?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td width="5px" style="padding: 0;"></td>
            </tr>

            <tr>
                <td width="5px" style="padding: 0;"></td>
                <td bgcolor="#FFFFFF" style="border: 1px solid #000; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
                    <table width="100%" style="background: #f9f9f9; border-bottom: 1px solid #eee; border-collapse: collapse; color: #999;">
                        <tbody>
                            <tr>
                                <td width="50%" style="padding: 20px;"><strong style="color: #333; font-size: 24px;"><?php echo $templateParams["body"]["rimanenti"] ?></strong> remaining</td>
                                <td align="right" width="50%" style="padding: 20px;">Thanks for using <span class="il">luminosita.food</span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td style="padding: 0;"></td>
                <td width="5px" style="padding: 0;"></td>
            </tr>
            <tr>
                <td width="5px" style="padding: 0;"></td>
                <td style="border: 1px solid #000; border-top: 0; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
                    <table cellspacing="0" style="border-collapse: collapse; border-left: 1px solid #000; margin: 0 auto; max-width: 600px;">
                        <tbody>
                            <tr>
                                <td valign="top"  style="padding: 20px;">
                                    <h3
                                        style="
                                            border-bottom: 1px solid #000;
                                            color: #000;
                                            font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
                                            font-size: 18px;
                                            font-weight: bold;
                                            line-height: 1.2;
                                            margin: 0;
                                            margin-bottom: 15px;
                                            padding-bottom: 5px;
                                        "
                                    >
                                        Summary
                                    </h3>
                                    <table cellspacing="0" style="border-collapse: collapse; margin-bottom: 40px;">
                                        <tbody>
                                            <tr>
                                                <td style="padding: 5px 0;"><?php echo $templateParams["body"]["name"]; ?></td>
                                                <td align="right" style="padding: 5px 0;"><?php echo "x".$templateParams["body"]["richieste"]; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td width="5px" style="padding: 0;"></td>
            </tr>

            <tr style="color: #666; font-size: 12px;">
                <td width="5px" style="padding: 10px 0;"></td>
                <td style="clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 10px 0;">
                    <table width="100%" cellspacing="0" style="border-collapse: collapse;">
                        <tbody>
                            <tr>
                                <td width="40%" valign="top" style="padding: 10px 0;">
                                    <h4 style="margin: 0;">Questions?</h4>
                                    <p style="color: #666; font-size: 12px; font-weight: normal; margin-bottom: 10px;">
                                        Please visit
                                        <a
                                            href="https://www.google.com/webhp?hl=it&ictx=2&sa=X&ved=0ahUKEwjN1pG856L5AhXNQ_EDHVJDDcQQPQgJ"
                                            style="color: #666;"
                                            target="_blank"
                                        >
                                            Google
                                        </a>
                                        for any questions.
                                    </p>
                                </td>
                                <td width="10%" style="padding: 10px 0;">&nbsp;</td>
                                <td width="40%" valign="top" style="padding: 10px 0;">
                                    <h4 style="margin: 0;"><span class="il">Luminosità</span> Vicinanza . Silenzio . Bevande</h4>
                                    <p style="color: #666; font-size: 12px; font-weight: normal; margin-bottom: 10px;">
                                        <a href="https://goo.gl/maps/vhQxGoiM6xqfpFMT6">Via dell'Università, Via Cesare Pavese, 47522 Cesena FC</a>
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td width="5px" style="padding: 10px 0;"></td>
            </tr>
        </tbody>
    </table>
</div>
