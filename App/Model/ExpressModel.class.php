<?php

namespace Model;

/**
 * 物流模型
 * @author heige
 */
class ExpressModel extends BaseModel
{

    protected $connection = 'test';    // 数据库配置
    protected $tableName  = 't_express'; // 表名，不带前缀

    public function getExpressByComNum($company = '', $orderno = '')
    {
        if (empty($company) || empty($orderno)) {
            return [];
        }

        $company     = addslashes($company);
        $orderno     = addslashes($orderno);
        $map['_com'] = $company;
        $map['_num'] = $orderno;
        $fields      = 'company,orderno,details';
        $res         = $this->where($map)->field($fields)->find();
        return !empty($res) ? $res : [];
    }

}
