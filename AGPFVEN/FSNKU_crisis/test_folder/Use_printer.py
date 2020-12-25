import sys
import win32api
import win32print

sys.path.append("D:\\python_agpfven\\lib\\site-packages")

win32api.ShellExecute(
    0,
    "printto",
    "D:\\xampp\\htdocs\\xampp\\Backend-repository\\AGPFVEN\\FSNKU_crisis\\wetransfer-686ade\\Archivo comprimido\\OS1 USA\\X000KI1JEJ_result_db.pdf",
    None,
    ".",
    0
)