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
public class Operacion4 extends Operacion {

    @Override
    public void operacion(HttpServletResponse response) {
        //String status="running.";
        try (PrintWriter out = response.getWriter()){
            out.write("<link href=\"css/bootstrap.min.css\" rel=\"stylesheet\">");            
            Runtime runtime = Runtime.getRuntime();
            Process process = runtime.exec("/opt/script/ssh");
            process.waitFor();
            BufferedReader buffer = new BufferedReader (new InputStreamReader(process.getInputStream()));
            String linea;
            while ((linea = buffer.readLine()) != null) {
                
                if (linea.endsWith("running.")){
                    out.write("<div class=\"main row\">"
                                + "<div class=\"col-xs-12 col-sm-8 col-md-9>"
                                    + "<div class=\"container\" >"
                                    + "Esto esta funcionando"
                                    + "<img class='img-rounded' src='images/encendido.png' height='42' width='42'>"
                                    + "</div>"
                                + "</div>");
                out.write("</div>");
                out.write(linea);
                }
                
            }
        } catch (IOException | InterruptedException ex) {
            System.out.print(ex);
        }
    }
    
}
