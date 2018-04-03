<?php
/**
 * 策略抽象类
 * @author wzy
 *
 */
interface Strategy
{
    public function calPrice ($price);
}
/**
 * 普通会员策略类
 *
 * @author wzy
 *
 */
class PrimaryStrategy implements Strategy
{
    public function calPrice ($price)
    {
        echo "普通会员无折扣";
        return $price;
    }
}
/**
 * 中级会员策略类
 *
 * @author wzy
 *
 */
class MiddleStrategy implements Strategy
{
    public function calPrice ($price)
    {
        echo "中级会员8折优惠";
        return $price * 0.8;
    }
}
/**
 * 高级会员策略类
 *
 * @author wzy
 *
 */
class HighStrategy implements Strategy
{
    public function calPrice ($price)
    {
        echo "高级会员7折优惠";
        return $price * 0.7;
    }
}
/**
 * Context实现类
 *
 * @author wzy
 *
 */
class Price
{
    /**
     * 具体的策略类对象
     *
     * @var object
     */
    private $strategyInstance;
    /**
     * 构造函数，传入一个具体的策略对象
     *
     * @param object $instance
     */
    public function __construct ($instance)
    {
        $this->strategyInstance = $instance;
    }
    /**
     * 计算货品的价格
     *
     * @param double $price
     */
    public function quote ($price)
    {
        return $this->strategyInstance->calPrice($price);
    }
}
/**
 * 客户端操作
 */
$high = new HighStrategy();
$priceClass = new Price($high);
$price = $priceClass->quote(400);
echo $price;
?>