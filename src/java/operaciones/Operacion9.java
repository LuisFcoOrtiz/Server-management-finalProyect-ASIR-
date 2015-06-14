/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package operaciones;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.PrintWriter;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author LFOM
 */
public class Operacion9 extends Operacion{
    //OPERACION PARA CONOCER LA CAPACIDAD DE ALMACENAMIENTO DE OWNCLOUD
    @Override
    public void operacion(HttpServletResponse response) {
        
        try (PrintWriter out = response.getWriter()){
            
            //ejecuta un script para ver la capacidad usada del disco duro owncloud
            Runtime runtime = Runtime.getRuntime();
            Process process = runtime.exec("/opt/script/owncloud/capacidadUsoOwncloud");
            process.waitFor();
            BufferedReader buffer = new BufferedReader (new InputStreamReader(process.getInputStream()));
            String capacidadUsoOwncloud;
            
            out.write("<div class='container'>");
            while ((capacidadUsoOwncloud = buffer.readLine()) != null) {                
                out.write("<div class=\"progress\">\n" +
                "  <div class=\"progress-bar\" role=\"progressbar\" aria-valuenow=\"60\" aria-valuemin=\"0\" aria-valuemax=\"100\" style=\"width:");out.write(capacidadUsoOwncloud);
                out.write(";\">\n" +
                "  Capacidad de disco usada: "+capacidadUsoOwncloud);out.write("\n" +
                "  </div>\n" +
                "</div>");
            }
            out.write("</div>");
        } catch (IOException ex) {
            Logger.getLogger(Operacion9.class.getName()).log(Level.SEVERE, null, ex);
        } catch (InterruptedException ex) {
            Logger.getLogger(Operacion9.class.getName()).log(Level.SEVERE, null, ex);
        } 
    } //final del metodo operacion
    
}
