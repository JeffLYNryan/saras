<html><head></head><body><div class="post-inner thin ">
<div class="entry-content">
<p> </p>





<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


<style>
            canvas {
                max-width: 100%;
                height: auto;
            }
        </style>

<script>
            var dataElementSeparator = "\x0A"; //Line Feed Character (LF)
            var recordSeparator = "\x1C"; //Record Separator Character (RS)
            var segmentTerminator = "\x0D"; //Carriage Return Character (CR)

            function generateNew() {
                
                var offsetAmount = 41
                var length = 278
                var totalLength = offsetAmount + length

                var aamvaCode =
                    //File Type
                    "ANSI " +

                    //Issuer Identification Number (Unique to each state)
                    "636000" +

                    //AAMVA Version Number
                    "07" +

                    //Jurisdiction Version Number
                    "00" +

                    //Number of sub-files in the barcode
                    "02" +

                    //First Sub-file Type (header)
                    "DL" +

                    //Offset (usually is 0041)
                    "0041" +

                    //Length
                    "0278" +

                    //Jurisdiction Specific Data
                    "ZV" +

                    //Offset plus length
                    "0319" +

                    //Length of Jurisdaction specific data (what comes after DAQ)
                    "0008" +

                    //Second Subfile Type (Other Data)
                    "DL" +

                    "DAQ" + document.getElementsByName("DAQ")[0].value + 


                    //Restrictions
                    //"\x0ADCBNONE" +

                    //Restrictions
                    //"\x0ADCDNONE" +

                    // Names: Last, First, Middle
                    "\x0ADAA" + document.getElementsByName("last")[0].value.toUpperCase() + "," + document.getElementsByName("first")[0].value.toUpperCase() + "," + document.getElementsByName("middle")[0].value.toUpperCase() + "," +

                    // Address
                    "\x0ADAG" + document.getElementsByName("address")[0].value.toUpperCase() +

                    // City
                    "\x0ADAI" + document.getElementsByName("city")[0].value.toUpperCase() +

                    //Province
                    "\x0ADAJ" + document.getElementsByName("province")[0].value.toUpperCase() +

                    // Postal Code
                    "\x0ADAK" + document.getElementsByName("zip")[0].value.toUpperCase() +

                    // License Class
                    "\x0ADAR" + document.getElementsByName("class")[0].value.toUpperCase() +

                    // Height in cm
                    "\x0ADAU" + document.getElementsByName("height")[0].value  + " cm" +

                    // Weight in kg
                    "\x0ADAX" + document.getElementsByName("weight")[0].value.toUpperCase() +

                    // Eye color
                    "\x0ADAY" + document.getElementsByName("eye")[0].value.toUpperCase() +

                    // Hair Color
                    "\x0ADAZ" + document.getElementsByName("hair")[0].value.toUpperCase() +

                    // Expiry date
                    "\x0ADBA" + document.getElementsByName("expiryDate")[0].value.replace(/-/g, "") +

                    // Birth Date
                    "\x0ADBB" + document.getElementsByName("birthDate")[0].value.replace(/-/g, "") +

                    // Gender
                    "\x0ADBC" + document.querySelector('input[name="gender"]:checked').value +

                    // Issue Date
                    "\x0ADBD" + document.getElementsByName("birthDate")[0].value.replace(/-/g, ""); //+
                    
                    //Country
                    //"\x0ADCGCAN";

                document.getElementById("rawData").value = aamvaCode;
                
                //Show the download button
                document.getElementById("downloadButton").style.visibility = "visible";

                refreshPDF417Canvas();
            }

            function refreshPDF417Canvas(aamvaCode = document.getElementById("rawData").value){
                
                fullcode = 

                    //Compliance Indicator
                    "@" +

                    //Header Separators
                    dataElementSeparator + recordSeparator + segmentTerminator +

                    aamvaCode;

                // Generate PDF417 Code
                PDF417.init(fullcode, 4);

                var barcode = PDF417.getBarcodeArray();

                var bw = 6;
                var bh = 3;

                var canvas = document.createElement("canvas");
                canvas.width = bw * barcode["num_cols"];
                canvas.height = bh * barcode["num_rows"];
                document.getElementById("barcode").innerHTML = "";
                document.getElementById("barcode").appendChild(canvas);
                canvas.setAttribute("id", "bccanvas")

                var ctx = canvas.getContext("2d");

                // print barcode elements
                var y = 0;
                // for each row
                for (var r = 0; r < barcode["num_rows"]; ++r) {
                    var x = 0;
                    // for each column
                    for (var c = 0; c < barcode["num_cols"]; ++c) {
                        if (barcode["bcode"][r][c] == 1) {
                            ctx.fillRect(x, y, bw, bh);
                        }
                        x += bw;
                    }
                    y += bh;
                }
            }

            function downloadCanvas() {
                var canvas = document.getElementById("bccanvas");
                image = canvas.toDataURL("image/png", 1.0).replace("image/png", "image/octet-stream");
                var link = document.createElement('a');
                link### = "barcode.png";
                link.href = image;
                link.click();
            }
        </script>
<table style="text-align: left;">
<tbody><tr>
<th style="width:50%">Label</th>
<th style="width:50%">Value</th>
</tr>
<tr>
<td>DL Number</td>
<td><input id="DL_field" name="DAQ" value="100000-000"></td>
</tr>
<tr>
<td>First Name</td>
<td><input name="first" value="Ryan"></td>
</tr>
<tr>
<td>Middle Name</td>
<td><input name="middle" value="Edward"></td>
</tr>
<tr>
<td>Last Name</td>
<td><input name="last" value="SWIFT"></td>
</tr>
<tr>
<td>Birth Date</td>
<td><input type="date" name="birthDate" value="2025-12-31"></td>
</tr>
<tr>
<td>Issue Date</td>
<td><input type="date" name="issueDate" value="2025-12-31"></td>
</tr>
<tr>
<td>Expiry Date</td>
<td><input type="date" name="expiryDate" value="2025-12-31"></td>
</tr>
<tr>
<td>License Class</td>
<td><input name="class" value="5"></td>
</tr>
<tr>
<td>Height (cm)</td>
<td><input type="number" name="height" value="000"></td>
</tr>
<tr>
<td>Weight (kg)</td>
<td><input type="number" name="weight" value="00"></td>
</tr>
<tr>
<td>Gender</td>
<td>
<input type="radio" name="gender" value="1" checked="checked">
<label for="male">Male</label>
<input type="radio" name="gender" value="2">
<label for="female">Female</label>
</td>
</tr>
<tr>
<td>Hair Color</td>
<td>
<select name="hair">
<option value="BRO">Brown</option>
<option value="BLK">Black</option>
<option value="BLN">Blond</option>
<option value="RED">Ginger</option>
<option value="GRY">Grey</option>
<option value="SDY">Sandy</option>
<option value="WHI">White</option>
<option value="BAL">Bald</option>
</select>
</td>
</tr>
<tr>
<td>Eye Color</td>
<td>
<select name="eye">
<option value="BRO">Brown</option>
<option value="BLK">Black</option>
<option value="BLU">Blue</option>
<option value="HAZ">Hazel</option>
<option value="GRN">Green</option>
<option value="MAR">Maroon</option>
<option value="DIC">Dichromatic</option>
<option value="GRY">Grey</option>
</select>
</td>
</tr>
<tr>
<td>Address</td>
<td><input name="address" value="11346 110A AVE"></td>
</tr>
<tr>
<td>City</td>
<td><input name="city" value="EDMONTON"></td>
</tr>
<tr>
<td>Province</td>
<td><input name="province" value="AB" maxlength="2"></td>
</tr>
<tr>
<td>Postal Code</td>
<td><input name="zip" value="T5H1K3" maxlength="6"></td>
</tr>
</tbody></table>
<br>
<div style="text-align: center;">
<button type="submit" onclick="generateNew();">Generate</button>
</div>
<br>
<br>
<div style="border:solid" id="barcode">
<p style="text-align:center; vertical-align:middle">SWIFTRYNX PDF 147 BARCODE HERE</p>
<canvas id="bccanvas"></canvas>
</div>
<br>
<div style="text-align: center; visibility: hidden" id="downloadButton">
<button onclick="downloadCanvas()">Download</button>
</div>
<br>
<div>

<textarea id="rawData" style="width: 100%; text-align: left; height: auto; resize: none; height:312px" onkeydown="refreshPDF417Canvas();" onkeyup="refreshPDF417Canvas();">Generate a barcode to view your data
            </textarea>

</div>


<h3 id="h-id-barcode-generator-data">ID Barcode Generator Data</h3>
<p>The raw barcode data is editable, feel free to customize your generated ID barcode data in the box, it it automatically updates the code.</p>
<h3 id="h-how-to-read-the-raw-data">How to Read the Raw Data</h3>
<p>This table provides a quick summary of the mandatory values on a barcode.</p>
<figure class="wp-block-table"><table data-mce-fragment="1" width="482">
<tbody data-mce-fragment="1">
<tr data-mce-fragment="1">
<td data-mce-fragment="1" width="93">DCA&nbsp;</td>
<td data-mce-fragment="1" width="389">Jurisdiction- specific vehicle class&nbsp;</td>
</tr>
<tr data-mce-fragment="1">
<td data-mce-fragment="1">DCB&nbsp;</td>
<td data-mce-fragment="1">Jurisdiction- specific restriction codes&nbsp;</td>
</tr>
<tr data-mce-fragment="1">
<td data-mce-fragment="1">DCD&nbsp;</td>
<td data-mce-fragment="1">Jurisdiction- specific endorsement codes&nbsp;</td>
</tr>
<tr data-mce-fragment="1">
<td data-mce-fragment="1">DBA&nbsp;</td>
<td data-mce-fragment="1">Document Expiration Date&nbsp;</td>
</tr>
<tr data-mce-fragment="1">
<td data-mce-fragment="1">DCS&nbsp;</td>
<td data-mce-fragment="1">Customer Family Name&nbsp;</td>
</tr>
<tr data-mce-fragment="1">
<td data-mce-fragment="1">DAC</td>
<td data-mce-fragment="1">Customer First Name</td>
</tr>
<tr data-mce-fragment="1">
<td data-mce-fragment="1">DAD</td>
<td data-mce-fragment="1">Customer Middle Name(s)</td>
</tr>
<tr data-mce-fragment="1">
<td data-mce-fragment="1">DBD</td>
<td data-mce-fragment="1">Document Issue Date</td>
</tr>
<tr data-mce-fragment="1">
<td data-mce-fragment="1">DBB</td>
<td data-mce-fragment="1">Date of Birth</td>
</tr>
<tr data-mce-fragment="1">
<td data-mce-fragment="1">DBC</td>
<td data-mce-fragment="1">Physical Description – Sex&nbsp;</td>
</tr>
<tr data-mce-fragment="1">
<td data-mce-fragment="1">DAY</td>
<td data-mce-fragment="1">Physical Description – Eye Color</td>
</tr>
<tr data-mce-fragment="1">
<td data-mce-fragment="1">DAU</td>
<td data-mce-fragment="1">Physical Description – Height&nbsp;</td>
</tr>
<tr data-mce-fragment="1">
<td data-mce-fragment="1">DAG</td>
<td data-mce-fragment="1">Address – Street 1&nbsp;</td>
</tr>
<tr data-mce-fragment="1">
<td data-mce-fragment="1">DAI.</td>
<td data-mce-fragment="1">Address – City&nbsp;</td>
</tr>
<tr data-mce-fragment="1">
<td data-mce-fragment="1">DAJ&nbsp;</td>
<td data-mce-fragment="1">Address – Jurisdiction Code&nbsp;</td>
</tr>
<tr data-mce-fragment="1">
<td data-mce-fragment="1">DAK&nbsp;</td>
<td data-mce-fragment="1">Address – Postal Code&nbsp;</td>
</tr>
<tr data-mce-fragment="1">
<td data-mce-fragment="1">DAQ</td>
<td data-mce-fragment="1">Customer ID Number&nbsp;</td>
</tr>
<tr data-mce-fragment="1">
<td data-mce-fragment="1">DCF&nbsp;</td>
<td data-mce-fragment="1">Document Discriminator&nbsp;</td>
</tr>
<tr data-mce-fragment="1">
<td data-mce-fragment="1">DCG</td>
<td data-mce-fragment="1">Country Identification</td>
</tr>
<tr data-mce-fragment="1">
<td data-mce-fragment="1">DDE</td>
<td data-mce-fragment="1">Family Name Truncation</td>
</tr>
<tr data-mce-fragment="1">
<td data-mce-fragment="1">DDF</td>
<td data-mce-fragment="1">First Name Trunctation</td>
</tr>
<tr data-mce-fragment="1">
<td data-mce-fragment="1">DDG</td>
<td data-mce-fragment="1">Middle Name Truncation</td>
</tr>
</tbody>
</table></figure>
<p>ID barcodes are generated using a standard called AAMVA, where data points are denoted by an end-of-line character followed by a 3-letter code.</p>
<p>If you want a full tutorial on how to read the raw data, take a look at our guide on the AAMVA standards <a href="https://ghostco.cc/aamva-standards-guide/" target="_blank" rel="noreferrer noopener">here</a>.</p>
<p>PLEASE NOTE: The BCS Scanner app does not work on Canadian ID Barcodes. All other apps work fine. You can read more about the processes in their app <a href="https://bcsidscanner.com/blog-one" target="_blank" rel="noreferrer noopener">here</a></p>
<p> </p>
<h3 id="h-how-does-the-id-barcode-generator-work">How Does the ID Barcode Generator Work?</h3>
<p>On the back of every ID, there is a barcode. This is so that it is possible for a computer to automatically read it, since it would be much more difficult for a computer to read simple text like there is on the front of the ID card. This can be used by facilities to record exactly who is inside at a time.</p>





</div>
</div></body></html>
