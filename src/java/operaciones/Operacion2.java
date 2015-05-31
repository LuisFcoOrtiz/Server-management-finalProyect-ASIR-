/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package operaciones;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author LFOM
 */
public class Operacion2 extends Operacion {

    @Override
    public void operacion(HttpServletResponse response) {
        try {
            PrintWriter out = response.getWriter();
            out.write("vengaa yaaa compaaae");
        } catch (IOException ex) {
            Logger.getLogger(Operacion2.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
}
