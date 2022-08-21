<div class="notification_det">
    <table class="notification_det_table">
        <tbody>
        <tr class="table_row">
                <td class="td_spacing"></td>
                <td class="notif_header">
                    <table>
                        <tbody>
                            <tr>
                                <td class="td_logo">
                                    <a href="#" target="_blank">
                                        <img src="<?php echo LOGO."scuro.png"; ?>" alt="lumininosita.food logo"/>
                                    </a>
                                </td>
                                <td class="td_info">
                                    Luminosita<br />
                                    Invoice <?php echo substr($templateParams["mail"]["obj"], 16, 7); ?><br />
                                    <?php echo $templateParams["mail"]["spedita"]?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td class="td_spacing"></td>
            </tr>

            <tr>
                <td class="td_spacing"></td>
                <td class="notif_head_info">
                    <table>
                        <tbody>
                            <tr>
                                <td class="td_pay"><strong><?php echo $templateParams["body"]["rimanenti"] ?></strong> remaining</td>
                                <td class="td_thx">Thanks for using <span class="il">luminosita.food</span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td class="td_spacing"></td>
            </tr>
            <tr>
                <td class="td_spacing"></td>
                <td class="body_info">
                    <table>
                        <tbody>
                            <tr>
                                <td class="summary">
                                    <h3> Summary </h3>
                                    <table>
                                        <tbody>
                                            <tr>
                                                <td class="td_name"><?php echo $templateParams["body"]["name"]; ?></td>
                                                <td class="td_count"><?php echo "x".$templateParams["body"]["richieste"]; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td class="td_spacing"></td>
            </tr>

            <tr class="table_footer">
                <td class="td_spacing"></td>
                <td class="notif_header">
                    <table>
                        <tbody>
                            <tr>
                                <td class="td_question" >
                                    <h4>Questions?</h4>
                                    <p>Please visit
                                        <a href="https://www.google.com/webhp?hl=it&ictx=2&sa=X&ved=0ahUKEwjN1pG856L5AhXNQ_EDHVJDDcQQPQgJ" target="_blank">
                                            Google
                                        </a>
                                        for any questions.
                                    </p>
                                </td>
                                <td class="padder">&nbsp;</td>
                                <td class="td_question">
                                    <h4><span class="il">Luminosità</span> Vicinanza . Silenzio . Bevande</h4>
                                    <p>
                                        <a href="https://goo.gl/maps/vhQxGoiM6xqfpFMT6">Via dell'Università, Via Cesare Pavese, 47522 Cesena FC</a>
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td class="padder"></td>
            </tr>
        </tbody>
    </table>
</div>
