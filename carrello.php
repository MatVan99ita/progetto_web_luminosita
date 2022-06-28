<?php
/**
 * Lista dei prodotti che si vogliono acquistare, scelta quantità e diminuzione quantità su db
 */
require_once 'bootstrap.php';

/**
 * Qua devo fare dei magheggi per il quale da php gestisco localmente il carrello con i cookie 
 * e le varie cose di comprvendita e la diminuzione di quantità nel db, la scelta di quanti prodotti acquistare
 * 
 * per aggiungere le cose devo usare una funzione che js che incrementa o diminuisce 
 * il count in prodotti da poter tenere in conto nell'icona del carrello, da salvare nei cookie sempre per poter gestire tutto
 * o lo uso come dato interno al json carrello che sarà tipo
 * 
 * Carrello{
 * 
 *      Recap{
 *          Soldi tot, Quantità di prodotti totale
 *      }
 * 
 *      Prodotto 1{
 *          ID, Nome, Prezzo, Quantità selezionata
 *      }
 * 
 *      Prodotto 2{
 *          ID, Nome, Prezzo, Quantità selezionata
 *      }
 *         ....
 * 
 *      Prodotto n{
 *          ID, Nome, Prezzo, Quantità selezionata
 *      }
 * }
 * 
 * Quindi la prima voce sarà il recap e dovrà sempre rimanere così modificando al massimo i dati, 
 * la parte dei prodotti non so se tenerli singolarmente o ad array per aggiungerne o eliminarne più facilmente
 */

require 'template/base.php';
?>