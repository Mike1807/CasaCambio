<%@ Page Title="Referrals" Language="C#" MasterPageFile="~/Behavior/Behavior.master" AutoEventWireup="true" CodeBehind="Referrals.aspx.cs"
Inherits="DMC.Behavior.Referrals" ClientIDMode="Static" EnableEventValidation="false" ValidateRequest="false" %>
.
.
.
    <asp:LinkButton ID="LinkButton2" runat="server" OnClientClick="createPDF();">
        <img src='../Images/icons/pdf.png'>PDF</asp:LinkButton>
.
.
.
<div id="export_pdf" class="pdfWidth_Portrait pdfSection" style="margin-top: 10px;" runat="server">
    <div class="alert-info text-center" style="margin: 0; padding: 0;">
        <table class="table table-condensed" style="margin-top: 0; padding: 30px; width: 100%;">
    .
    .
    .   
        </table>
    </div>
</div>
.
.
.
<asp:HiddenField ID="pdfData" runat="server" />
.
.
.
<script type="text/javascript">
    function createPDF() {
        document.getElementById("pdfData").value = document.getElementById("export_pdf").innerHTML;
    }
</script>