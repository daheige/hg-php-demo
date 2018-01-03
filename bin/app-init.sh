#!/usr/bin/env bash
#初始化目录，请根据需要修改

root_dir=$(cd "$(dirname "$0")"; cd ..; pwd)

chown -R nobody.nobody $0
chmod -R +x $root_dir/bin/*

# 需要创建的目录
mk_dirs=("${root_dir}/data/runtime")

# 创建目录并设定权限
for dir in ${mk_dirs[@]}; do
    dir=$root_dir/$dir
    if [ ! -d $dir ]; then
        mkdir -p $dir
        echo "Created Directory: $dir"
    fi
    chown -R nobody.nobody $dir
    chmod -R 755 $dir
done

rm_dirs=("${root_dir}/data/runtime/Data" "${root_dir}/data/runtime/Cache" "${root_dir}/data/untime/Temp")
# 删除缓存目录
for dir in ${rm_dirs[@]}; do
    dir=$root_dir/$dir
    if [ -d $dir ]; then
        rm -R $dir
        echo "Delete Directory: $dir"
    fi
done

# 删除缓存配置
filename=$root_dir"/data/runtime/common~runtime.php"
if [ -f $filename ]; then
    rm $filename
    echo "remove $filename"
fi
