<?php

namespace App\Repositories;

class DataTable
{
    public static function setDatatable($cQryObj, $aColumns = array(), $sIndexColumn = "")
    {
        $Sortdir = Input::get('sSortDir_0');
        $iDisplayStart = Input::get('iDisplayStart');
        $iDisplayLength = Input::get('iDisplayLength');
        $iSortCol = Input::get('iSortCol_0');
        $iSortingCols = Input::get('iSortingCols');
        $sSearch = Input::get('sSearch');

        $sLimit = "";
        if (isset($iDisplayStart) && $iDisplayLength != '-1') {
            $sLimit = $iDisplayStart . ", " . $iDisplayLength;
        }

        $sOrder = "";
        if (isset($iSortCol)) {
            $field = $aColumns[$iSortCol];
        }

        $sWhere = "";
        if ($sSearch != "") {
            for ($i = 0; $i < count($aColumns); $i++) {
                $sWhere .= $aColumns[$i] . "*" . $sSearch . "|";
            }
        }

        for ($i = 0; $i < count($aColumns); $i++) {
            if (Input::get('bSearchable_' . $i) == "true" && Input::get('sSearch_' . $i) != '') {
                if ($sWhere == "") {
                    $sWhere = "WHERE ";
                } else {
                    $sWhere = "AND ";
                }
                $sWhere .= $aColumns[$i] . ", " . Input::get('sSearch_' . $i);
            }
        }

        $order_by = explode(",", $sOrder);
        $limits = explode(",", $sLimit);
        $filter = explode("|", $sWhere);

        $cQryObjOrig = clone $cQryObj;
        $cQryObjTemp = clone $cQryObj;
        $cQryObjTemp = $cQryObjTemp->take($limits[1])->skip($limits[0]);


        if ($sWhere != "") {
            $cQryObjTemp->where(function ($query) use ($i, $filter, $cQryObjTemp, $cQryObjOrig) {
                for ($i = 0; $i < count($filter) - 1; $i++) {
                    $xFilter = explode("*", $filter[$i]);
                    if ($i == 0) {
                        $cQryObjTemp = $query->where($xFilter[0], 'LIKE', '%' . $xFilter[1] . '%');
                        $cQryObjOrig = $query->where($xFilter[0], 'LIKE', '%' . $xFilter[1] . '%');
                    } else {
                        $cQryObjTemp = $query->where($xFilter[0], 'LIKE', '%' . $xFilter[1] . '%', 'OR');
                        $cQryObjOrig = $query->where($xFilter[0], 'LIKE', '%' . $xFilter[1] . '%', 'OR');
                    }
                }
            });
            $cQryObjOrig->where(function ($query) use ($i, $filter, $cQryObjTemp, $cQryObjOrig) {
                for ($i = 0; $i < count($filter) - 1; $i++) {
                    $xFilter = explode("*", $filter[$i]);
                    if ($i == 0) {
                        $cQryObjTemp = $query->where($xFilter[0], 'LIKE', '%' . $xFilter[1] . '%');
                        $cQryObjOrig = $query->where($xFilter[0], 'LIKE', '%' . $xFilter[1] . '%');
                    } else {
                        $cQryObjTemp = $query->where($xFilter[0], 'LIKE', '%' . $xFilter[1] . '%', 'OR');
                        $cQryObjOrig = $query->where($xFilter[0], 'LIKE', '%' . $xFilter[1] . '%', 'OR');
                    }
                }
            });
        }

        $cQryObjResult = $cQryObjTemp->orderby($field, $Sortdir)->get();

        $output = array(
            "sEcho" => intval(Input::get('sEcho')),
            "iTotalRecords" => $cQryObjOrig->count(),
            "iTotalDisplayRecords" => $cQryObjOrig->count(),
            "aaData" => array(),
            'objResult' => $cQryObjResult,
        );

        return $output;
    }
}