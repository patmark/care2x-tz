{{* chemlab_data_sample.tpl *}}
<table width="100%" border="0">
    <tbody>
        <tr valign="top">
            <td>
                {{* table block for the patient basic data *}}
                <form method="post" {{$sFormAction}} onSubmit="return pruf(this)" name="datain">
                    <table cellspacing=1 cellpadding=1 width="50%"  bgcolor=#ffdddd style="margin: auto;">
                        <tbody>
                            <tr>
                                <td class="adm_item">{{$LDCaseNr}}:</td>
                                <td class="adm_input">{{$sPID}}</td>
                            </tr>
                            <tr>
                                <td class="adm_item">{{$LDLastName}}, {{$LDName}}:</td>
                                <td class="adm_input"><b>{{$sLastName}}, {{$sName}}</b></td>
                            </tr>
                            <tr>
                                <td class="adm_item">{{$LDBday}}:</td>
                                <td class="adm_input"><b>{{$sBday}}</b></td>
                            </tr>
                            <tr>
                                <td class="adm_item">{{$LDJobIdNr}}:</td>
                                <td class="adm_input">{{$sJobIdNr}}</td>
                            </tr>

                        </tbody>
                    </table>

                    <table cellspacing=1 cellpadding=1 width="50%"  bgcolor=#ffdddd style="margin: auto;">
                        <tbody>
                            {{$inParameters}}

                            <tr>
                                <td>{{$pbSave}}</td>
                                <td align="right">{{$pbCancel}}</td>
                            </tr>
                        </tbody>
                    </table>

                </form>
            </td>

        </tr>
    </tbody>
</table>