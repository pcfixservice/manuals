<meta http-equiv="Content-Type" content="t/html; charset=UTF-8" />

    <html>

 <head>
 <meta name="ROBOTS" content="NOINDEX, NOFOLLOW">
 <TITLE></TITLE>
 <link href="stylesheets/common.css" type="text/css" rel="stylesheet">
 </head>

 <p id="hdr_home"><h1><FONT COLOR=blue>VI</FONT> <span>Commands</span></h1></a></p>
 </div>


<style type="text/css" media="screen">
#wrapper{
lign: left;
  font-family: 'Bowlby One SC', cursive;
  margin: adjust;
  background: white;
  font-size: 1vw;
}


<img src="" width="600" height="300" /></a>
</style>

<font color="red"></font>

<pre>  
<font color="red"></font>
<font color="blue"></font>
<u></u>
<font size="6"></font>
<ul id="wrapper"> 


<li>


<font color="red"><u>PROCEDURE TO CHANGE LOWERCASE TO UPPERCASE OR VICEVERSA ON VI</u></font>

You can change the case of text:

Toggle case "HellO" to "hELLo" with <font color="blue"> g~ then a movement.</font>
Uppercase "HellO" to "HELLO" with   <font color="blue">gU then a movement.</font>
Lowercase "HellO" to "hello" with   <font color="blue">gu then a movement.</font>

Alternatively, you can visually select text then press <font color="blue">~</font> to toggle case, or U to convert to uppercase,
or u to convert to lowercase.

<font color="blue">~</font>    Toggle case of the character under the cursor, or all visually-selected characters.
<font color="blue">3~</font>   Toggle case of the next three characters.
<font color="blue">g~3w</font> Toggle case of the next three words.
<font color="blue">g~iw</font> Toggle case of the current word (inner word - cursor anywhere in word).
<font color="blue">g~$</font>  Toggle case of all characters to end of line.
<font color="blue">g~~</font>  Toggle case of the current line (same as V~).

The above uses ~ to toggle case. In each example, you can replace ~ with u to convert to lowercase, or with U 
to convert to uppercase. For example:

<font color="blue">U</font>    Uppercase the visually-selected text.  First press v or V then move to select text.
 If you don't select text, pressing U will undo all changes to the current line.
<font color="blue">gUU</font>  Change the current line to uppercase (same as VU).
<font color="blue">gUiw</font> Change current word to uppercase.
<font color="blue">u</font>    Lowercase the visually-selected text. If you don't select text, pressing u will undo the last change.
<font color="blue">guu</font>  Change the current line to lowercase (same as Vu).


        Moverse a la izquierda		        <font color="magenta"> h</font>
	Moverse a la derecha		        <font color="magenta"> l</font>
	Moverse arriba			        <font color="magenta"> k</font>
	Moverse abajo 			        <font color="magenta"> j</font>
	Insertar texto			        <font color="magenta"> i</font>
	Borrar caracter (como Supr)	        <font color="magenta"> x</font>


        Salir sin grabar los cambios		<font color="magenta"> q</font>
	Salir grabando los cambios		<font color="magenta"> x</font>
	Salir grabando los cambios		<font color="magenta"> wq</font>
	Salvar los cambios actuales		<font color="magenta"> w</font>
	Salvar como fichero			<font color="magenta"> w fichero</font>
	Insertar desde el cursor fichero	<font color="magenta"> r fichero</font>
	Editar fichero				<font color="magenta"> e fichero</font>
	Editar siguiente fichero		<font color="magenta"> n</font>
	Editar anterior fichero			<font color="magenta"> prev</font>
        
                              **** Copiar y Pegar ***

        Para copiar la linea actual             <font color="magenta"> yy</font>
        Para copiar una palabra                 <font color="magenta"> yw</font>
        Para copiar 7 lineas                    <font color="magenta"> y7y</font>
        Para pegar después del cursor           <font color="magenta"> p</font>
        Para pegar antes del cursor             <font color="magenta"> P</font>


        Deshacer                                 <font color="magenta">ESC y seguido la tecla "u"</font>
        Rehacer                                  <font color="magenta">ESC  Ctrl+r</font>
 

	Moverse hasta el fin de la línea			<font color="magenta"> $</font>
	Moverse hasta el principio de la línea			<font color="magenta"> 0</font>
	Moverse hasta la siguiente palabra			<font color="magenta"> w</font>
	Moverse hasta la anterior palabra			<font color="magenta"> b</font>
	Moverse hasta la siguiente palabra*			<font color="magenta"> W</font>
	Moverse hasta la anterior palabra*			<font color="magenta"> B</font>
	Moverse a la línea n***					<font color="magenta"> nG</font>
	Moverse hasta el final de la siguiente palabra		<font color="magenta"> e</font>
	Moverse hasta el final de la siguiente palabra* 	<font color="magenta"> E</font>
	Encontrar el siguiente caracter c en la línea actual	<font color="magenta"> fc</font>
	Encontrar el anterior caracter c en la línea actual	<font color="magenta"> Fc</font>
	Llegar hasta justo antes del siguiente caracter c	<font color="magenta"> t</font>
	Llegar hasta justo después del anterior caracter c	<font color="magenta"> T</font>
	Encontrar el paréntesis contrario**			<font color="magenta"> %</font>
	Moverse hasta la siguiente frase			<font color="magenta"> (</font>
	Moverse hasta la anterior frase				<font color="magenta"> )</font>
	Moverse hasta el anterior párrafo			<font color="magenta"> {</font>
	Moverse hasta el siguiente párrafo			<font color="magenta"> }</font>
	Moverse hasta la parte superior de la pantalla		<font color="magenta"> H</font>
	Moverse hasta la parte media de la pantalla		<font color="magenta"> M</font>
	Moverse hasta la parte inferior de la pantalla		<font color="magenta"> L</font>
	Avanzar página						<font color="magenta"> ^F</font>
	Retroceder página					<font color="magenta"> ^B</font>


                                  <FONT COLOR="BLUE">SEARCHING AND REPLACING</FONT>

vi also has powerful search and replace capabilities. To search the text of an open file for a specific string 
(combination of characters or words), in the command mode type a colon (:), "s," forward slash (/) and the search
 string itself. What you type will appear on the bottom line of the display screen. Finally, press ENTER, and the 
matching area of the text will be highlighted, if it exists. If the matching string is on an area of text that is not 
currently displayed on the screen, the text will scroll to show that area.

The formal syntax for searching is:

<font color="blue">:s/string</font>
<font color="blue">:/string_to-find</font>find a string from top to down
<font color="blue">:?string_to-find</font>find a string from down to top
<font color="blue">:s/pattern/replace/</font>replace the first ocurrence of the current line
<font color="blue">:%s/pattern/replace/</font>replace the first ocurrence of the entire text
<font color="blue">:%s/pattern/replace/g</font>replace  all the ocurrences of the entire text
<font color="blue">:40,50s/pattern/replace/</font>replace the first ocurrence from the lines 40 to 50
<font color="blue">:40,50s/pattern/replace/g</font>replace all ocurrences from the lines 40 to 50

                              <FONT COLOR="BLUE">Insert a new line after every 80 characters in vim</font>
:%s/.\{80}/&\r/g

 %	process the entire file
 s  	substitute
 .  	matches any character
 {80}	matches every 80 ocurrences of previous character (in this case, any character)
 &	the match result
 \r	newline character
 g	perform the replacement globally
