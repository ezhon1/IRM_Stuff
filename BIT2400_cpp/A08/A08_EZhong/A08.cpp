#include "A08.h"

A08::A08(QWidget *parent)
    : QWidget(parent)
{
    ui.setupUi(this);

    grid = new QGridLayout(this);

    frame = new QFrame();
    frame->setFrameStyle(QFrame::Box);
    grid->addWidget(frame, 1, 2);

    a = new QLabel("Kilograms", this);
    grid->addWidget(a, 0, 0);

    b = new QLabel("Pounds", this);
    grid->addWidget(b, 0, 2);

    out = new QLabel("  out", this);
    grid->addWidget(out, 1, 2);

    btnConv = new QPushButton("Convert", this);
    grid->addWidget(btnConv, 1, 1);
    connect(btnConv, &QPushButton::clicked, this, &A08::Convert);

    spinInput = new QSpinBox;
    spinInput->setRange(0, 100);
    connect(spinInput, QOverload<int>::of(&QSpinBox::valueChanged), this, &A08::UpdateSlider);
    grid->addWidget(spinInput, 1, 0);

    menuBar = new QMenuBar();
    grid->setMenuBar(menuBar);

    mFile = menuBar->addMenu("&File");
    QAction* quit = new QAction("&Quit", this);
    connect(quit, &QAction::triggered, qApp, &QApplication::quit);
    mFile->addAction(quit);

    sliderInput = new QSlider(Qt::Horizontal);
    sliderInput->setRange(0, 100);
    sliderInput->setTickPosition(QSlider::TicksBothSides);
    sliderInput->setTickInterval(25);
    grid->addWidget(sliderInput, 3, 0);
    connect(sliderInput, &QSlider::valueChanged, this, &A08::UpdateSpin);

    quit->setShortcut(tr("CTRL+Q"));

    setLayout(grid);
}

void A08::Convert() {
    int in = spinInput->value();
    in = in * 2.21;
    out->setText(QString::fromStdString("  ") + QString::number(in));
}

void A08::UpdateSlider() {
    sliderInput->setValue(spinInput->value());
}

void A08::UpdateSpin() {
    spinInput->setValue(sliderInput->value());
}