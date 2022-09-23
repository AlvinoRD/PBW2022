#include <iostream>
#include <stdio.h>

using namespace std;

int main()
{
    int panjang, lebar, tinggi, luas;

    cout << "Menghitung Luas Balok" << endl;
    cout << "masukkan panjang : ";
    cin >> panjang;

    cout << "masukkan lebar : ";
    cin >> lebar;

    cout << "masukkan tinggi : ";
    cin >> tinggi;

    //hitung luas balok
    luas = ((2*panjang*lebar)+(2*panjang*tinggi)+(2*lebar*tinggi));
    cout << endl;

    cout << "luas balok     :   " << luas << endl;
    return 0;
}
