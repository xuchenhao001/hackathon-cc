<?php
/**
 * Created by PhpStorm.
 * User: chenking
 * Date: 2017/3/9
 * Time: 21:37
 */

namespace Home\Controller;


use Think\Controller\RestController;

class InsuranceController extends RestController
{
    //show insurance
    function index(){

        $this->display('./Public/insurance.html');
    }
    /**
     * @description 给保险公司展示的是添加车辆的基本信息
     * @param  name
     * */
    function addBornCarInfo(){
        //车辆类型
        $CARTYPE=I('CAR_TYPE','BMW');
        //车辆的生产日期时间 String yyyy-MM-dd HH:MM:ss
        $BORN_TIME=I('BORN_TIME','1999-01-01 00:00:00');
        //初始价格, 元
        $CAR_FIRST_PRICE=I('PRICE','100');
        //todo

    }
    /*
     * @ description  给出一个基本的技术报告，来分析这辆车的历史记录，目的是方便保险公司确定投保的价格
     * */
    function GiveReport(){

        $baseinfo=array(
            'Fullname'=>'Kevin Carter',
            'Factory'=>'BMW',
            'Position'=>'hipping Manager',
            'VIN'=>'3XUI78',
            'DriverCard'=>'3213897',
            'CarType'=>'Small',


        );
        $this->assign("baseinfo",$baseinfo);
        //输入的参数可以唯一确定一辆车的信息
        $this->display('./Public/report.html');


    }

    //看保养得项目是否全部做完啦
    //事故，不同事故的影响，七折，事故的严重程度，事故类型。事故级别
    //更换零件，雨刷，🍌易损件，核心价值没有影响，更换水箱，发动机。，等级划分， 有哪些重要的核心零件？
    //LED大灯，损坏了大灯
    //车的每次1000万次车坏损率，平均故障数和车的销售数量，车型的口碑
    //车的过户次数，
    //发动机的排放标准，跟年限有关
    //外观，，A,B,C,D,骨架类不能有变形，严重影响价格
    //可以修的非支撑的东西，
    //里子，电瓶，减震器，
    //变速箱， 转向系统，发动机更换说明出现了大的事故，车主不愿意买这辆车
    //车辆的剖析图，对于零件进行分类，





}