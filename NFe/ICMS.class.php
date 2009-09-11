<?php
/**
 * Este arquivo é parte do projeto NFePHP - Nota Fiscal eletrônica em PHP.
 *
 * Este programa é um software livre: você pode redistribuir e/ou modificá-lo
 * sob os termos da Licença Pública Geral GNU como é publicada pela Fundação 
 * para o Software Livre, na versão 3 da licença, ou qualquer versão posterior.
 *
 * Este programa é distribuído na esperança que será útil, mas SEM NENHUMA
 * GARANTIA; sem mesmo a garantia explícita do VALOR COMERCIAL ou ADEQUAÇÃO PARA
 * UM PROPÓSITO EM PARTICULAR, veja a Licença Pública Geral GNU para mais
 * detalhes.
 *
 * Você deve ter recebido uma cópia da Licença Publica GNU junto com este
 * programa. Caso contrário consulte <http://www.fsfla.org/svnwiki/trad/GPLv3>.
 *
 * @package   NFePHP
 * @name      ICMS
 * @license   http://www.gnu.org/licenses/gpl.html GNU/GPL v.3
 * @copyright 2009 &copy; NFePHP
 * @link      http://www.nfephp.org/
 * @author    {@link http://www.walkeralencar.com Walker de Alencar} <contato@walkeralencar.com>
 */

/**
 * ICMS
 * Nível 4 :: N01
 *
 * @author  Djalma Fadel Junior <dfadel@ferasoft.com.br>
 */
class NFe_ICMS {
    var $orig;      // N11 - origem da mercadoria
    var $CST;       // N12 - tributação do ICMS
    var $modBC;     // N13 - modalidade de determinação da BC do ICMS
    var $pRedBC;    // N14 - percentual da redução de BC
    var $vBC;       // N15 - valor da BC do ICMS
    var $pICMS;     // N16 - alíquota do imposto
    var $vICMS;     // N17 - valor do ICMS
    var $modBCST;   // N18 - modalidade de determinação da BC do ICMS ST
    var $pMVAST;    // N19 - percentual da margem de valor adicionado do ICMS ST
    var $pRedBCST;  // N20 - percentual da redução de BC do ICMS ST
    var $vBCST;     // N21 - valor da BC do ICMS ST
    var $pICMSST;   // N22 - alíquota do imposto do ICMS ST
    var $vICMSST;   // N23 - valor do ICMS ST

    function __construct() {
    }

    function get_xml($dom) {

        $N01 = $dom->appendChild($dom->createElement('ICMS'));

        switch ($this->CST) {

            case '00' :
                $N02 = $N01->appendChild($dom->createElement('ICMS00'));
                $N11 = $N02->appendChild($dom->createElement('orig',        $this->orig));
                $N12 = $N02->appendChild($dom->createElement('CST',         sprintf("%02d", $this->CST)));
                $N13 = $N02->appendChild($dom->createElement('modBC',       $this->modBC));
                $N15 = $N02->appendChild($dom->createElement('vBC',         number_format($this->vBC, 2, ".", "")));
                $N16 = $N02->appendChild($dom->createElement('pICMS',       number_format($this->pICMS, 2, ".", "")));
                $N17 = $N02->appendChild($dom->createElement('vICMS',       number_format($this->vICMS, 2, ".", "")));
                break;

            case '10' :
                $N03 = $N01->appendChild($dom->createElement('ICMS10'));
                $N11 = $N03->appendChild($dom->createElement('orig',        $this->orig));
                $N12 = $N03->appendChild($dom->createElement('CST',         sprintf("%02d", $this->CST)));
                $N13 = $N03->appendChild($dom->createElement('modBC',       $this->modBC));
                $N15 = $N03->appendChild($dom->createElement('vBC',         number_format($this->vBC, 2, ".", "")));
                $N16 = $N03->appendChild($dom->createElement('pICMS',       number_format($this->pICMS, 2, ".", "")));
                $N17 = $N03->appendChild($dom->createElement('vICMS',       number_format($this->vICMS, 2, ".", "")));
                $N18 = $N03->appendChild($dom->createElement('modBCST',     $this->modBCST));
                $N19 = (isset($this->pMVAST))   ? $N03->appendChild($dom->createElement('pMVAST',      number_format($this->pMVAST, 2, ".", "")))   : null;
                $N20 = (isset($this->pRedBCST)) ? $N03->appendChild($dom->createElement('pRedBCST',    number_format($this->pRedBCST, 2, ".", ""))) : null;
                $N21 = $N03->appendChild($dom->createElement('vBCST',       number_format($this->vBCST, 2, ".", "")));
                $N22 = $N03->appendChild($dom->createElement('pICMSST',     number_format($this->pICMSST, 2, ".", "")));
                $N23 = $N03->appendChild($dom->createElement('vICMSST',     number_format($this->vICMSST, 2, ".", "")));
                break;

            case '20' :
                $N04 = $N01->appendChild($dom->createElement('ICMS20'));
                $N11 = $N04->appendChild($dom->createElement('orig',        $this->orig));
                $N12 = $N04->appendChild($dom->createElement('CST',         sprintf("%02d", $this->CST)));
                $N13 = $N04->appendChild($dom->createElement('modBC',       $this->modBC));
                $N14 = $N04->appendChild($dom->createElement('pRedBC',      number_format($this->pRedBC, 2, ".", "")));
                $N15 = $N04->appendChild($dom->createElement('vBC',         number_format($this->vBC, 2, ".", "")));
                $N16 = $N04->appendChild($dom->createElement('pICMS',       number_format($this->pICMS, 2, ".", "")));
                $N17 = $N04->appendChild($dom->createElement('vICMS',       number_format($this->vICMS, 2, ".", "")));
                break;

            case '30' :
                $N05 = $N01->appendChild($dom->createElement('ICMS30'));
                $N11 = $N05->appendChild($dom->createElement('orig',        $this->orig));
                $N12 = $N05->appendChild($dom->createElement('CST',         sprintf("%02d", $this->CST)));
                $N18 = $N05->appendChild($dom->createElement('modBCST',     $this->modBCST));
                $N19 = $N05->appendChild($dom->createElement('pMVAST',      number_format($this->pMVAST, 2, ".", "")));
                $N20 = $N05->appendChild($dom->createElement('pRedBCST',    number_format($this->pRedBCST, 2, ".", "")));
                $N21 = $N05->appendChild($dom->createElement('vBCST',       number_format($this->vBCST, 2, ".", "")));
                $N22 = $N05->appendChild($dom->createElement('pICMSST',     number_format($this->pICMSST, 2, ".", "")));
                $N23 = $N05->appendChild($dom->createElement('vICMSST',     number_format($this->vICMSST, 2, ".", "")));
                break;

            case '40' :
            case '41' :
            case '50' :
                $N06 = $N01->appendChild($dom->createElement('ICMS40'));
                $N11 = $N06->appendChild($dom->createElement('orig',        $this->orig));
                $N12 = $N06->appendChild($dom->createElement('CST',         sprintf("%02d", $this->CST)));
                break;

            case '51' :
                $N07 = $N01->appendChild($dom->createElement('ICMS51'));
                $N11 = $N07->appendChild($dom->createElement('orig',        $this->orig));
                $N12 = $N07->appendChild($dom->createElement('CST',         sprintf("%02d", $this->CST)));
                $N13 = (isset($this->modBC))  ? $N07->appendChild($dom->createElement('modBC',       $this->modBC))                    : null;
                $N14 = (isset($this->pRedBC)) ? $N07->appendChild($dom->createElement('pRedBC',      number_format($this->pRedBC, 2, ".", ""))) : null;
                $N15 = (isset($this->vBC))    ? $N07->appendChild($dom->createElement('vBC',         number_format($this->vBC, 2, ".", "")))    : null;
                $N16 = (isset($this->pICMS))  ? $N07->appendChild($dom->createElement('pICMS',       number_format($this->pICMS, 2, ".", "")))  : null;
                $N17 = (isset($this->vICMS))  ? $N07->appendChild($dom->createElement('vICMS',       number_format($this->vICMS, 2, ".", "")))  : null;
                break;

            case '60' :
                $N08 = $N01->appendChild($dom->createElement('ICMS60'));
                $N11 = $N08->appendChild($dom->createElement('orig',        $this->orig));
                $N12 = $N08->appendChild($dom->createElement('CST',         sprintf("%02d", $this->CST)));
                $N21 = $N08->appendChild($dom->createElement('vBCST',       number_format($this->vBCST, 2, ".", "")));
                $N23 = $N08->appendChild($dom->createElement('vICMSST',     number_format($this->vICMSST, 2, ".", "")));
                break;

            case '70' :
                $N09 = $N01->appendChild($dom->createElement('ICMS70'));
                $N11 = $N09->appendChild($dom->createElement('orig',        $this->orig));
                $N12 = $N09->appendChild($dom->createElement('CST',         sprintf("%02d", $this->CST)));
                $N13 = $N09->appendChild($dom->createElement('modBC',       $this->modBC));
                $N14 = $N09->appendChild($dom->createElement('pRedBC',      number_format($this->pRedBC, 2, ".", "")));
                $N15 = $N09->appendChild($dom->createElement('vBC',         number_format($this->vBC, 2, ".", "")));
                $N16 = $N09->appendChild($dom->createElement('pICMS',       number_format($this->pICMS, 2, ".", "")));
                $N17 = $N09->appendChild($dom->createElement('vICMS',       number_format($this->vICMS, 2, ".", "")));
                $N18 = $N09->appendChild($dom->createElement('modBCST',     $this->modBCST));
                $N19 = (isset($this->pMVAST))   ? $N09->appendChild($dom->createElement('pMVAST',      number_format($this->pMVAST, 2, ".", "")))   : null;
                $N20 = (isset($this->pRedBCST)) ? $N09->appendChild($dom->createElement('pRedBCST',    number_format($this->pRedBCST, 2, ".", ""))) : null;
                $N21 = $N09->appendChild($dom->createElement('vBCST',       number_format($this->vBCST, 2, ".", "")));
                $N22 = $N09->appendChild($dom->createElement('pICMSST',     number_format($this->pICMSST, 2, ".", "")));
                $N23 = $N09->appendChild($dom->createElement('vICMSST',     number_format($this->vICMSST, 2, ".", "")));
                break;

            case '90' :
                $N10 = $N01->appendChild($dom->createElement('ICMS90'));
                $N11 = $N10->appendChild($dom->createElement('orig',        $this->orig));
                $N12 = $N10->appendChild($dom->createElement('CST',         sprintf("%02d", $this->CST)));
                $N13 = $N10->appendChild($dom->createElement('modBC',       $this->modBC));
                $N15 = $N10->appendChild($dom->createElement('vBC',         number_format($this->vBC, 2, ".", "")));
                $N14 = (isset($this->pRedBC)) ? $N10->appendChild($dom->createElement('pRedBC',      number_format($this->pRedBC, 2, ".", ""))) : null;
                $N16 = $N10->appendChild($dom->createElement('pICMS',       number_format($this->pICMS, 2, ".", "")));
                $N17 = $N10->appendChild($dom->createElement('vICMS',       number_format($this->vICMS, 2, ".", "")));
                $N18 = $N10->appendChild($dom->createElement('modBCST',     $this->modBCST));
                $N19 = (isset($this->pMVAST))   ? $N10->appendChild($dom->createElement('pMVAST',      number_format($this->pMVAST, 2, ".", "")))   : null;
                $N20 = (isset($this->pRedBCST)) ? $N10->appendChild($dom->createElement('pRedBCST',    number_format($this->pRedBCST, 2, ".", ""))) : null;
                $N21 = $N10->appendChild($dom->createElement('vBCST',       number_format($this->vBCST, 2, ".", "")));
                $N22 = $N10->appendChild($dom->createElement('pICMSST',     number_format($this->pICMSST, 2, ".", "")));
                $N23 = $N10->appendChild($dom->createElement('vICMSST',     number_format($this->vICMSST, 2, ".", "")));
                break;

        } // fim switch

        return $N01;
    }

    function insere($con, $imposto_id) {
        $sql = "INSERT INTO ICMS VALUES (NULL";
        $sql.= ", ".$con->quote($imposto_id);
        $sql.= ", ".$con->quote($this->orig);
        $sql.= ", ".$con->quote($this->CST);
        $sql.= ", ".$con->quote($this->modBC);
        $sql.= ", ".$con->quote($this->pRedBC);
        $sql.= ", ".$con->quote($this->vBC);
        $sql.= ", ".$con->quote($this->pICMS);
        $sql.= ", ".$con->quote($this->vICMS);
        $sql.= ", ".$con->quote($this->modBCST);
        $sql.= ", ".$con->quote($this->pMVAST);
        $sql.= ", ".$con->quote($this->pRedBCST);
        $sql.= ", ".$con->quote($this->vBCST);
        $sql.= ", ".$con->quote($this->pICMSST);
        $sql.= ", ".$con->quote($this->vICMSST);
        $sql.= ")";

        $qry = $con->query($sql);

        if (MDB2::isError($qry)) {
            set_error('Erro ICMS: '.$qry->getMessage());
            return false;
        } else {
            $ICMS_id = $con->lastInsertID("ICMS", "ICMS_id");
        }
    }
}
