{{* Headline page encapsulating frame *}}

{{if $bShowPrompt}}
<table>
    <tr>
        <td>{{$sMascotImg}}</td>
        <td  class="prompt">
            {{$LDArticleSaved}}
            <hr>
        </td>
    </tr>
</table>
{{/if}}

<TABLE CELLSPACING=3 cellpadding=0 border="0" width="{{$news_normal_display_width}}">

    <tr>
        <td VALIGN="top" width="100%">

            {{include file="news/headline_titleblock.tpl"}}
            <p>
                {{include file=$sNewsBodyTemplate}}
            <p>
                {{$sBackLink}}

        </td>

        <!--      Vertical spacer column      -->
        <TD   width=1  background="../../gui/img/common/biju/vert_reuna_20b.gif">&nbsp;</TD>

        <TD VALIGN="top">

            {{$sSubMenuBlock}}

        </TD>
    </tr>
</table>
