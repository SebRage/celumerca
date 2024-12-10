# Importar las librerías necesarias
from http.server import BaseHTTPRequestHandler, HTTPServer
from urllib.parse import parse_qs
from pymongo import MongoClient
from datetime import datetime
import json

# Configuración de la conexión a MongoDB
client = MongoClient("mongodb+srv://root:12345@clustergratis.x4rmc.mongodb.net/")
db = client["CeluMerca"]
comments_collection = db["Comentarios"]

# Clase para manejar las solicitudes HTTP
class RequestHandler(BaseHTTPRequestHandler):
    def do_POST(self):
        if self.path == '/submit_comment':
            content_length = int(self.headers['Content-Length'])
            post_data = self.rfile.read(content_length).decode('utf-8')
            
            # Parsear los datos recibidos
            parsed_data = parse_qs(post_data)
            name = parsed_data.get('name', [None])[0]
            email = parsed_data.get('email', [None])[0]
            product =parsed_data.get('product',[None])[0]
            message = parsed_data.get('message', [None])[0]
            

            # Validar los datos
            if not name or not email or not message:
                self.send_response(400)
                self.send_header('Content-Type', 'application/json')
                self.end_headers()
                self.wfile.write(json.dumps({"error": "Todos los campos son obligatorios."}).encode('utf-8'))
                return

            # Crear el documento para insertar en MongoDB
            comment = {
                "Nombre": name,
                "Correo": email,
                "Producto" : product,
                "Mensaje": message,
                "Fecha": datetime.utcnow()
            }

            try:
                # Insertar el comentario en la colección
                comments_collection.insert_one(comment)

                self.send_response(200)
                self.send_header('Content-Type', 'application/json')
                self.end_headers()
                self.wfile.write(json.dumps({"success": "Comentario enviado correctamente."}).encode('utf-8'))

            except Exception as e:
                self.send_response(500)
                self.send_header('Content-Type', 'application/json')
                self.end_headers()
                self.wfile.write(json.dumps({"error": str(e)}).encode('utf-8'))

# Configuración del servidor
PORT = 8000
server = HTTPServer(('localhost', PORT), RequestHandler)

print(f"Servidor corriendo en http://localhost:{PORT}")
server.serve_forever()
