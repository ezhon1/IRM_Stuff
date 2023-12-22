#include "A08.h"
#include <QtWidgets/QApplication>

int main(int argc, char *argv[])
{
    QApplication a(argc, argv);
    A08 w;
    w.setWindowIcon(QIcon("4.jpg"));
    w.show();
    return a.exec();
}
