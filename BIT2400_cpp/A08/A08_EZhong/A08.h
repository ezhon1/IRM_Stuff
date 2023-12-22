#pragma once

#include <QtWidgets/QWidget>
#include "ui_A08.h"
#include "QGridLayout"
#include "Qlabel"
#include "QPushButton"
#include "QSpinBox"
#include "QMenuBar"
#include "QMenu"
#include "QSlider"
#include "QFrame"

class A08 : public QWidget
{
    Q_OBJECT

public:
    A08(QWidget *parent = Q_NULLPTR);
    void Convert();
    void UpdateSlider();
    void UpdateSpin();

private:
    Ui::A08Class ui;

    QGridLayout* grid;
    QLabel* a;
    QLabel* b;
    QLabel* out;
    QSpinBox* spinInput;
    QPushButton* btnConv;
    QMenuBar* menuBar;
    QMenu* mFile;
    QSlider* sliderInput;
    QFrame* frame;
};
