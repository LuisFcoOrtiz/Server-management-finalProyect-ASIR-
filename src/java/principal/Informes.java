/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package principal;

import com.itextpdf.text.Document;
import com.itextpdf.text.DocumentException;
import com.itextpdf.text.Element;
import com.itextpdf.text.Image;
import com.itextpdf.text.Paragraph;
import com.itextpdf.text.pdf.PdfWriter;
import java.io.BufferedReader;
import java.io.ByteArrayOutputStream;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.PrintWriter;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author LFOM
 */
public class Informes extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException, DocumentException, InterruptedException {
            // SERVLET PARA LA IMPRESIÓN DE LOS REGISTROS DE SISTEMA
            try {
            // Ejecucion de comando que sera introducido en el pdf
            Runtime runtime = Runtime.getRuntime();
            Process process = runtime.exec("/opt/script/owncloud/logOwncloud");
            process.waitFor();
            BufferedReader buffer = new BufferedReader (new InputStreamReader(process.getInputStream()));
            String linea;                        
            
            //Imagen para documento PDF
            Image imagen = Image.getInstance("images/owncloud.png");
            imagen.setAlignment(Element.ALIGN_CENTER); //donde estara la imagen localizada           
            imagen.setAlt("50");
            
            // Creo objeto document de la clase Document     
            Document document = new Document();
            
            // paso 2
            ByteArrayOutputStream baos = new ByteArrayOutputStream();
            PdfWriter.getInstance(document, baos);
            
            // Abro nuevo documento PDF
            document.open();
            document.addAuthor("Administrator");
            
            //Nuevo parrafo con texto centrado
            Paragraph parrafo1 = new Paragraph("Informe de servidor Owncloud");
            parrafo1.setAlignment(1); //Centrar el texto
            document.add(imagen); //introduccion de la imagen en el documento pdf
            document.add(parrafo1);                        
            
            // bucle ejecutando el comando e introduciendolo en un nuevo parrafo del PDF
            while ((linea = buffer.readLine()) != null) {
                document.add(new Paragraph(linea));
            }
            
            // Cierre del documento PDF
            document.close();
 
            // Response headers
            response.setHeader("Expires", "0");
            response.setHeader("Cache-Control",
                "must-revalidate, post-check=0, pre-check=0");
            response.setHeader("Pragma", "public");
            // Tipo de contenido que será
            response.setContentType("application/pdf");
            // the contentlength
            response.setContentLength(baos.size());
            // Extrae todo el PDF para introducirlo en el servlet
            OutputStream os = response.getOutputStream();
            baos.writeTo(os);
            os.flush();
            os.close();
        }
        catch(DocumentException e) {
            throw new IOException(e.getMessage());
        }
        
    }
     private static final long serialVersionUID = 6067021675155015602L;
    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        try {
            processRequest(request, response);
        } catch (DocumentException ex) {
            Logger.getLogger(Informes.class.getName()).log(Level.SEVERE, null, ex);
        } catch (InterruptedException ex) {
            Logger.getLogger(Informes.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        try {
            processRequest(request, response);
        } catch (DocumentException ex) {
            Logger.getLogger(Informes.class.getName()).log(Level.SEVERE, null, ex);
        } catch (InterruptedException ex) {
            Logger.getLogger(Informes.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>

}
